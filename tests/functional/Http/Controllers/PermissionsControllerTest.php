<?php

use Vanguard\Events\Permission\Created;
use Vanguard\Events\Permission\Updated;
use Vanguard\Events\Role\PermissionsUpdated;
use Vanguard\Permission;
use Vanguard\Role;
use Mockery as m;

class PermissionsControllerTest extends FunctionalTestCase
{
    protected $user;

    protected $seed = false;

    public function setUp()
    {
        parent::setUp();
        $this->user = $this->createSuperUser();
        $this->be($this->user);
    }

    public function test_permissions_list()
    {
        $permission = factory(Permission::class)->create();

        $this->visit('permission')
            ->seeInTable('table', $permission->display_name, 1, 1);

        $this->assertEquals(1, $this->crawler->filter('table tbody tr')->count());
        $this->assertEquals(2, $this->crawler->filter('table tbody tr:nth-child(1) > td')->count());
    }

    public function test_permission_list_with_roles()
    {
        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();

        $role->perms()->attach($permission->id);

        $this->visit('permission')
            ->seeInTable('table', $permission->display_name, 1, 1)
            ->seeElement('input[type=checkbox][name="roles['.$role->id.'][]"]');

        $this->assertEquals(1, $this->crawler->filter('table tbody tr')->count());
        $this->assertEquals(3, $this->crawler->filter('table tbody tr:nth-child(1) > td')->count());
    }

    public function test_save_role_permissions()
    {
        $this->expectsEvents(PermissionsUpdated::class);

        $permission = factory(Permission::class)->create();
        $role = factory(Role::class)->create();

        $role->perms()->attach($permission->id);

        $this->visit('permission')
            ->submitForm('Save Permissions', [
                'roles' => [
                    $role->id => [$permission->id]
                ]
            ]);

        $this->seePageIs('permission')
            ->see('Permissions saved successfully.')
            ->seeIsChecked("roles[{$role->id}][]")
            ->seeInDatabase('permission_role', [
                'role_id' => $role->id,
                'permission_id' => $permission->id
            ]);
    }

    public function test_create_permission()
    {
        $this->app->instance('middleware.disable', false);

        $this->expectsEvents(Created::class);

        $data = $this->stubPermissionData();

        $this->visit('permission')
            ->click('Add Permission')
            ->seePageIs('permission/create')
            ->submitForm('Create Permission', $data);

        $this->seePageIs('permission')
            ->see('Permission created successfully.')
            ->seeInDatabase('permissions', $data);
    }

    public function test_update_permission()
    {
        $this->expectsEvents(Updated::class);

        $permission = factory(Permission::class)->create();

        $data = $this->stubPermissionData();

        $this->visit('permission')
            ->clickOn('a[title="Edit Permission"]')
            ->seePageIs("permission/{$permission->id}/edit")
            ->submitForm('Update Permission', $data);

        $this->seePageIs('permission')
            ->see('Permission updated successfully.')
            ->seeInDatabase('permissions', $data + ['id' => $permission->id]);
    }

    public function test_delete()
    {
        $this->expectsEvents(\Vanguard\Events\Permission\Deleted::class);

        $permission = factory(Permission::class)->create();

        $this->delete(route('permission.destroy', $permission->id))
            ->followRedirects();

        $this->seePageIs('permission')
            ->see('Permission deleted successfully.')
            ->dontSeeInDatabase('permissions', ['id' => $permission->id]);

    }

    public function test_if_non_removable_permissions_can_be_removed()
    {
        $permission = factory(Permission::class)->create(['removable' => false]);

        $this->visit('permission');
        $this->assertEquals(0, $this->crawler->filter("a[title='Delete Permission']")->first()->count());

        $this->delete(route('permission.destroy', $permission->id))
            ->followRedirects();

        $this->assertResponseStatus(404);
    }

    private function stubPermissionData()
    {
        return [
            'name' => 'foo_permission',
            'display_name' => 'Foo Permission',
            'description' => 'the description'
        ];
    }
}
