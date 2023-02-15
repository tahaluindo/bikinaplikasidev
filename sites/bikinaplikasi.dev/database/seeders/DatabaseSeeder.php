<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminMenuTableSeeder::class);
        $this->call(AdminOperationLogTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminRoleMenuTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(AdminRoleUsersTableSeeder::class);
        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminUserPermissionsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AkunPembayaranTableSeeder::class);
        $this->call(AngsuranTableSeeder::class);
        $this->call(DownloadTableSeeder::class);
        $this->call(InformasiTableSeeder::class);
        $this->call(KaryawanTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(NotifikasiTableSeeder::class);
        $this->call(NotifikasiDetailTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        $this->call(PembayaranTableSeeder::class);
        $this->call(PengaturanTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PesananTableSeeder::class);
        $this->call(PesananDetailTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RujukanTableSeeder::class);
        $this->call(SessionTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TripayTableSeeder::class);
        $this->call(TwostepauthTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VideoTableSeeder::class);
        $this->call(VisitorTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        $this->call(AlatTableSeeder::class);
        $this->call(PlaylistTableSeeder::class);
        $this->call(ProdukTagsTableSeeder::class);
        $this->call(SumberKodeTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
