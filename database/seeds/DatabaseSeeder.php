<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AmphurTableSeeder::class);
        $this->call(AnalyzerTypeTableSeeder::class);
        $this->call(AppointmentOrderDataTableSeeder::class);
        $this->call(ClinicMasterTableSeeder::class);
        $this->call(DepartmentMasterTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(DoctorMasterTableSeeder::class);
        $this->call(EthnicityMasterTableSeeder::class);
        $this->call(FormLabMasterTableSeeder::class);
        $this->call(GroupBarcodeMasterTableSeeder::class);
        $this->call(GroupResultMasterTableSeeder::class);
        $this->call(GroupUserMasterTableSeeder::class);
        $this->call(HospitalMasterTableSeeder::class);
        $this->call(LabBarcodeMasterTableSeeder::class);
        $this->call(LabItemMasterTableSeeder::class);
        $this->call(LabItemTypeMasterTableSeeder::class);
        //$this->call(LabOrderDetailTableSeeder::class);
        //$this->call(LabOrderMainTableSeeder::class);
        $this->call(LabResultPhotoDetailTableSeeder::class);
        $this->call(LabSpecimenItemMasterTableSeeder::class);
        $this->call(LabSubGroupItemMasterTableSeeder::class);
        $this->call(MenuMasterDataTableSeeder::class);
        $this->call(MenuRelateUserGroupTableSeeder::class);
        $this->call(NationalityMasterTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PatientMasterTableSeeder::class);
        $this->call(PatientTypeTableSeeder::class);
        $this->call(PositionMasterTableSeeder::class);
        $this->call(PrefixNameMasterTableSeeder::class);
        $this->call(ProfileQcItemDetailTableSeeder::class);
        $this->call(ProfileQcMasterTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(QcLevelMasterTableSeeder::class);
        $this->call(QcNameMasterTableSeeder::class);
        $this->call(QcOrderDetailTableSeeder::class);
        $this->call(QcOrderMainTableSeeder::class);
        $this->call(ReligionMasterTableSeeder::class);
        $this->call(ServicePlanMasterTableSeeder::class);
        $this->call(SpecialtyMasterTableSeeder::class);
        $this->call(SpecimenItemRejectNoteMasterTableSeeder::class);
        //$this->call(SpecimenItemRejectOrderTableSeeder::class);
        $this->call(TableSystemDescriptionTableSeeder::class);
        $this->call(TableSystemMasterTableSeeder::class);
        $this->call(UserMasterTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WardTableSeeder::class);
    }
}
