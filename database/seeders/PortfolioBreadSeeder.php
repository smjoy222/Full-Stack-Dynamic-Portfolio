<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class PortfolioBreadSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            // slug => [model, display singular, display plural, icon, fields]
            'personal_details' => ['App\\Models\\PersonalDetail', 'Personal Detail', 'Personal Details', 'voyager-person', ['user_id','description','blood_group','department','age','dob','address','gender']],
            'projects'         => ['App\\Models\\Project',        'Project',        'Projects',         'voyager-portfolio', ['user_id','name','description','github_url','demo_url','images','type','reference','tools','keywords','status']],
            'skills'           => ['App\\Models\\Skill',          'Skill',          'Skills',           'voyager-star', ['user_id','name','type','level','logo']],
            'education'        => ['App\\Models\\Education',      'Education',      'Educations',       'voyager-study', ['user_id','type','name','institute','enrolled_year','passing_year','grade']],
            'experiences'      => ['App\\Models\\Experience',     'Experience',     'Experiences',      'voyager-bag', ['user_id','type','designation','organization','from_date','to_date']],
            'achievements'     => ['App\\Models\\Achievement',    'Achievement',    'Achievements',     'voyager-trophy', ['user_id','name','type','certification','organization','date','images','category']],
            'infos'            => ['App\\Models\\Info',           'Info',           'Infos',            'voyager-info-circled', ['user_id','portfolio','address','description','designation']],
        ];

        foreach ($tables as $slug => [$model, $singular, $plural, $icon, $fields]) {
            $this->ensureDataType($slug, $model, $singular, $plural, $icon);
            $this->ensureBasicRows($slug, $fields);
            $this->ensureMenuItem($slug, $plural, $icon);
            $this->ensurePermissions($slug);
        }
    }

    protected function ensureDataType(string $slug, string $model, string $singular, string $plural, string $icon): void
    {
        $dt = DataType::firstOrNew(['slug' => $slug]);
        if (!$dt->exists) {
            $dt->fill([
                'name'                  => $slug,
                'display_name_singular' => $singular,
                'display_name_plural'   => $plural,
                'icon'                  => $icon,
                'model_name'            => $model,
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    protected function ensureBasicRows(string $slug, array $fields): void
    {
        $dt = DataType::where('slug', $slug)->firstOrFail();

        $order = 1;
        $this->saveRow($dt, 'id', 'number', __('voyager::seeders.data_rows.id'), 1, 0, 0, 0, 0, 0, $order++);

        // Simple numeric user_id field; relationship can be added later if needed
        if (in_array('user_id', $fields, true)) {
            $this->saveRow($dt, 'user_id', 'number', 'User', 0, 1, 1, 1, 1, 0, $order++);
        }

        foreach ($fields as $field) {
            if (in_array($field, ['user_id'], true)) {
                continue;
            }
            $type = in_array($field, ['description','address','images','tools','keywords','settings'], true) ? 'text_area' : 'text';
            // Better input types per table/field
            if (in_array($slug, ['projects','achievements'], true) && $field === 'images') {
                $type = 'multiple_images';
            }
            if ($slug === 'skills' && $field === 'level') {
                $type = 'number';
            }
            if (in_array($field, ['created_at','updated_at','date','dob','from_date','to_date'], true)) {
                $type = 'timestamp';
            }
            $this->saveRow($dt, $field, $type, ucwords(str_replace(['_','id'], [' ', 'ID'], $field)), 0, 1, 1, 1, 1, 1, $order++);

            // If skills.level, set details for number input range
            if ($slug === 'skills' && $field === 'level') {
                $row = DataRow::where('data_type_id', $dt->id)->where('field', 'level')->first();
                if ($row) {
                    $details = is_string($row->details) && $row->details ? json_decode($row->details, true) : [];
                    $details = array_merge(['min' => 0, 'max' => 100, 'step' => 1], $details ?: []);
                    $row->details = json_encode($details);
                    $row->save();
                }
            }
        }

        $this->saveRow($dt, 'created_at', 'timestamp', __('voyager::seeders.data_rows.created_at'), 0, 1, 1, 0, 0, 0, $order++);
        $this->saveRow($dt, 'updated_at', 'timestamp', __('voyager::seeders.data_rows.updated_at'), 0, 0, 0, 0, 0, 0, $order++);
    }

    protected function saveRow(DataType $dt, string $field, string $type, string $label, int $required, int $browse, int $read, int $edit, int $add, int $delete, int $order): void
    {
        $row = DataRow::firstOrNew(['data_type_id' => $dt->id, 'field' => $field]);
        if (!$row->exists) {
            $row->fill([
                'type'         => $type,
                'display_name' => $label,
                'required'     => $required,
                'browse'       => $browse,
                'read'         => $read,
                'edit'         => $edit,
                'add'          => $add,
                'delete'       => $delete,
                'order'        => $order,
            ])->save();
        }
    }

    protected function ensureMenuItem(string $slug, string $title, string $icon): void
    {
        $menu = Menu::where('name', 'admin')->first();
        if (!$menu) {
            return;
        }
        $mi = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'route'   => 'voyager.' . $slug . '.index',
        ]);
        if (!$mi->exists) {
            $mi->fill([
                'title'      => $title,
                'url'        => '',
                'target'     => '_self',
                'icon_class' => $icon,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 20,
            ])->save();
        }
    }

    // Optionally add permissions for each slug so admin can access
    protected function ensurePermissions(string $slug): void
    {
        if (class_exists(\TCG\Voyager\Models\Permission::class) && class_exists(\TCG\Voyager\Models\Role::class)) {
            $permModel = \TCG\Voyager\Models\Permission::class;
            $roleModel = \TCG\Voyager\Models\Role::class;
            $permModel::generateFor($slug);
            if ($admin = $roleModel::where('name', 'admin')->first()) {
                $ids = $permModel::where('table_name', $slug)->pluck('id')->all();
                if ($ids) $admin->permissions()->syncWithoutDetaching($ids);
            }
        }
    }
}
