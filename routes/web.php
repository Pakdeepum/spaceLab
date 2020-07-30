<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/getToken", function(){
    return csrf_field();
});

Route::get('/api/order_download/{barcode}', 'BA400Controller@getOrder')->name('getOrder');
Route::post('/api/order_upload', 'BA400Controller@updateOrder')->name('updateOrder');
Route::get('/api/get_all_qc_profile', 'BA400Controller@getOrderProfile')->name('getOrderProfile');
Route::post('/api/qc_upload', 'BA400Controller@updateQcOrder')->name('updateQcOrder');
Route::post('/api/update_order_status', 'BA400Controller@updateStatus')->name('updateStatus');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/Welcome', 'HomeController@index')->name('home');

Route::get('/layout', function () {
    return view('layouts.app-element');
});

// Route Manage
Route::prefix('/management')->group(function () {
    Route::get('/manageData','ManagedataController@index')->name('management.data');
    Route::get('/manageData/listMaster','ManagedataController@listMaster')->name('manageData.listMaster');
    Route::get('/manageData/listMasterDetail/{id}','ManagedataController@listMasterDetail')->name('manageData.dataall');
    Route::get('/manageData/listSubMaster/{id}','ManagedataController@listSubMasterDetail')->name('manageData.Subdataall');
    Route::get('/manageData/softdeletesub/{idmaster}/{idsub}','ManagedataController@softDelete')->name('manageData.softdelete');
    Route::get('/manageData/listDataEdit/{idmaster}/{idsub}','ManagedataController@listdataEdit')->name('manageData.listdataEdit');

    Route::get('/manageLabitem','ManageLabItemController@index');
    Route::post('/manageLabitem/EditListItemLab','ManageLabItemController@SaveEditLab')->name('manageLabItem.EditDataItem');
    Route::post('/manageLabitem/UpdateOrder','ManageLabItemController@UpdateOrder');
    Route::get('/manageLabitem/getItemLab','ManageLabItemController@getItemLab');
    Route::get('/manageLabitem/ListItemLab','ManageLabItemController@ListItemLab');
    Route::get('/manageLabitem/ListItemLabType','ManageLabItemController@ListItemLabType');
    Route::get('/manageLabitem/ListGroupBarcode','ManageLabItemController@ListGroupBarcode');
    Route::get('/manageLabitem/ListGroupResult','ManageLabItemController@ListGroupResult');
    Route::get('/manageLabitem/ListLabBarcode','ManageLabItemController@ListLabBarcode');
    Route::get('/manageLabitem/ListSpecimen','ManageLabItemController@ListSpecimen');
    Route::get('/manageLabitem/DelLab/{IdLab}','ManageLabItemController@DelLab');
    Route::get('/manageLabitem/ListItemLab/{IdLab}','ManageLabItemController@ListItemIndexLab');

    Route::post('/manageLabitem/AddLabItem','ManageLabItemController@AddLabItem')->name('manageLabItem.Add');
    //delete user
    Route::get('/manageUser/deleteuser/{id}','ManageuserController@DeleteUser')->name('manageUser.DeleteUser');
    //edit user
    Route::get('/manageUser/edituser/{id}','ManageuserController@EditUser')->name('manageUser.EditUser');
    //save edit user
    Route::post('/manageUser/saveedituser','ManageuserController@SaveEditUser')->name('manageUser.SaveEditUser');

    Route::post('/manageData/EditdataMaster','ManagedataController@DataEdit')->name('manageData.DataEdit');
    Route::get('/manageData/AdddataMaster/{id}','ManagedataController@DataAdd')->name('manageData.DataAdd');

    Route::post('/manageData/InsertdataMaster','ManagedataController@DataInsert')->name('manageData.DataInsert');

    Route::get('/manageUser/setPincode','ManageuserController@PincodePage')->name('manageUser.SetPinCode');
    Route::post('/manageUser/UpdatePincode','ManageuserController@UpdatePincode')->name('manageUser.UpdatePincode');
    Route::get('/manageUser/GetCurrentUser','ManageuserController@GetCurrentUser')->name('manageUser.GetCurrentUser');
    Route::get('/manageUser/GetAllUserPincode','ManageuserController@GetAllUserPincode')->name('manageUser.GetAllUserPincode');
    Route::get('/manageUser/GetUserByPincode/{pincode}','ManageuserController@GetUserByPincode')->name('manageUser.GetUserByPincode');
    Route::get('/manageUser/GetUserById/{id}','ManageuserController@GetUserById')->name('manageUser.GetUserById');
    Route::get('/manageUser','ManageuserController@index')->name('management.user');
    Route::post('/AddUser','ManageuserController@AddUser')->name('management.AddUser');
    Route::get('/manageConfig','ManageconfigController@index');
    Route::get('/manageLogfile','ManagelogfileController@index');
    Route::get('/manageMenu','ManagemenuController@index');
    Route::get('/manageMenu/listgroup','ManagemenuController@listgroup');
    Route::get('/manageMenu/listMenu/{id}','ManagemenuController@listMenu');
    Route::get('/manageMenu/deletemenu/{idgroup}/{idtag}','ManagemenuController@deletemenu');
    Route::get('/manageMenu/listAddmenu/{idgroup}','ManagemenuController@listAddmenu');
    Route::get('/manageMenu/Addmenu','ManagemenuController@Addmenu')->name('managemenu.Addmenu');

    Route::get('/manageUpload','ManageuploadController@index');
    Route::get('/PrefixMasterData','ManageuserController@PrefixMasterData');
    Route::get('/PositionMasterData','ManageuserController@PositionMasterData');
    Route::get('/DepartmentMasterData','ManageuserController@DepartmentMasterData');
    Route::get('/GroupUserMasterData','ManageuserController@GroupUserMasterData');
    Route::get('/listuser','ManageuserController@listuser');
    Route::get('/config/deleteItem/{id}','ManageconfigController@deleteItem');
    Route::get('/config/item','ManageconfigController@listitemMaster');
    Route::post('/config/Updateitem','ManageconfigController@UpdateitemConfig')->name('Config.UpdateItemConfig');

    // manage patient
    Route::get('/managePatient','ManagepatientController@index');
    Route::get('/listPatient','ManagepatientController@listPatientAll');
    Route::get('/listPatient/{searchData}','ManagepatientController@listPatient');
    Route::post('/AddPatient','ManagepatientController@AddPatient')->name('management.AddPatient');
    Route::get('/EthnicityMaster','ManagepatientController@ethnicityMasterData');
    Route::get('/NationalityMaster','ManagepatientController@nationalityMasterData');
    Route::get('/ReligionMaster','ManagepatientController@religionMasterData');
    Route::get('/ProvinceMaster','ManagepatientController@provinceMasterData');
    Route::get('/AmphurMaster/{provinceID}','ManagepatientController@amphurMasterData');
    Route::get('/DistrictMaster/{amphurID}','ManagepatientController@districtMasterData');
    Route::get('/PatientTypeData','ManagepatientController@PatientTypeData');
    Route::get('/AddPatient','ManagepatientController@AddPatient');
    //delete patient
    Route::get('/managePatient/deletePatient/{PatientID}','ManagepatientController@DeletePatient')->name('managePatient.DeletePatient');
    //edit patient
    Route::get('/managePatient/editPatient/{PatientID}','ManagepatientController@EditPatient')->name('managePatient.EditPatient');
    //save edit patient
    Route::post('/managePatient/saveEditPatient','ManagepatientController@SaveEditPatient')->name('managePatient.SaveEditPatient');

    // manage doctor
    Route::get('/manageDoctor','ManageDoctorController@index');
    Route::get('/listDoctor/{searchData}','ManageDoctorController@listDoctor');
    Route::get('/listDoctor','ManageDoctorController@listDoctorAll');
    Route::post('/AddDoctor','ManageDoctorController@AddDoctor')->name('management.AddDoctor');
    Route::get('/specialtyMaster','ManageDoctorController@specialtyMasterData');
    //delete doctor
    Route::get('/manageDoctor/deleteDoctor/{DoctorID}','ManageDoctorController@DeleteDoctor')->name('manageDoctor.DeleteDoctor');
    //edit doctor
    Route::get('/manageDoctor/editDoctor/{DoctorID}','ManageDoctorController@EditDoctor')->name('manageDoctor.EditDoctor');
    //save edit doctor
    Route::post('/manageDoctor/saveEditDoctor','ManageDoctorController@SaveEditDoctor')->name('manageDoctor.SaveEditDoctor');

    //profile test
    Route::get('/profileTest','ProfileTestController@index')->name('profileTest-SetupProfileTest');
    Route::get('/profileTest/getAllProfile','ProfileTestController@GetAllProfileTest');
    Route::get('/profileTest/getAllProfileByLabSubGroup/{id}','ProfileTestController@GetProfileTestByLabSubGroup');
    Route::get('/profileTest/getProfile/{id}','ProfileTestController@GetProfileTestById');
    Route::post('/profileTest/CreateProfileTest','ProfileTestController@CreateProfileTest')->name('profileTest-CreateProfileTest');
    Route::post('/profileTest/EditProfileTest','ProfileTestController@EditProfileTest')->name('profileTest-EditProfileTest');
    Route::get('/profileTest/DeleteProfileTest/{id}','ProfileTestController@DeleteProfileTestById')->name('profileTest-DeleteProfileTest');
});

// Route Report
Route::prefix('/report')->group(function(){
    Route::get('/HISreport','HISreportController@index');
    Route::get('/LISreport','LISreportController@index');

    Route::get('/patientDairy','ReportController@patientDairyReport');
    Route::get('/appointment','ReportController@appointment');
    Route::get('/patientDaily','ReportController@patientDailyReport');
    Route::get('/resultsIndividual','ReportController@resultsIndividualReport');

    Route::get('/report1','ReportController@report1');
    Route::get('/report2','ReportController@report2');
    Route::get('/report6','ReportController@report6');
    Route::get('/report3','ReportController@report3');
    Route::get('/report4','ReportController@report4');
    Route::get('/report5','ReportController@report5');
    Route::get('/listgroupitem','ReportController@listgroupitem');
    Route::get('/report3','ReportController@report3');
    Route::get('/report12','ReportController@report12');
    Route::get('/report14','ReportController@report14');
    Route::get('/report9','ReportController@report9');
    Route::get('/report7','ReportController@report7');

    /**report carrier */
    Route::get('/listgroupitem','ReportController@listgroupitem');
    Route::get('/getPatient','ReportController@getPatient');
    Route::get('/getWard','ReportController@getWard');
    Route::get('/getAnalyzerType','ReportController@getAnalyzerType');

    Route::get('/ReportToHotXP/{id}','MainRecordedResultsController@ReportToHotXP');
});

// Route Main
Route::prefix('/main')->group(function () {
    Route::get('/Test','TestController@test');
    Route::get('/DeDatabase','TestController@DeDatabase');
    Route::get('/UpdateLabResultDetail/{id}/{Result}','TestController@UpdateLabResultDetail');
    Route::get('/RecordedResults','MainRecordedResultsController@index');
    Route::get('/HistoryResults','MainHistoryResultsController@index');
    Route::get('/SelectLab','MainHistoryResultsController@SelectLab');
    Route::get('/SelectLabData/{labID}','MainHistoryResultsController@SelectLabData');
    Route::get('/SelectLabItem/{labID}','MainHistoryResultsController@SelectLabItem');
    Route::get('/GetSpecimenById/{item_id}','MainRecieveLabController@GetSpecimenById');
    /**
     * ###### barcode generate #######
     */
    Route::post('/recieveLab/GenBarcode','MainRecieveLabController@BarcodeGen')->name('recieveLab.BarcodeGen');
    Route::get('/RecordedResults/History/{id}/{patient}','MainHistoryResultsController@getHistory');
    Route::get('/RecordedResults/History/{labID}','MainHistoryResultsController@SelectLabItem');
    Route::get('/RecordedResults/printpdf/{id}','MainRecordedResultsController@PrintLab');
    Route::get('/RecordedResults/printTotlaLab','MainRecordedResultsController@PrintTotalLab');
    Route::post('/RecordedResults/exportWithSelectLab','MainRecordedResultsController@exportWithSelectLab')->name('main.exportWithSelectLab');

    Route::get('/recieveLab','MainRecieveLabController@index'); 
    Route::post('/recieveLab/export/', 'MainRecieveLabController@export')->name('recieveLab.export');
    Route::post('/recieveLab/import', 'MainRecieveLabController@import')->name('recieveLab.import');
    Route::get('/resultCopyScan','MainResultCopyController@index');
    Route::get('/resultDocumentPhoto','MainResultDocumentPhotoController@index');
    Route::get('/DataPatient','MainRecieveLabController@DataPatient');
    Route::get('/DataHospital','MainRecieveLabController@DataHospital');
    Route::get('/DataDepartment','MainRecieveLabController@DataDepartment');
    Route::get('/DataClinic','MainRecieveLabController@DataClinic');
    Route::get('/DataDoctor','MainRecieveLabController@DataDoctor');
    Route::get('/DataServicePlan','MainRecieveLabController@DataServicePlan');
    Route::get('/DataWard','MainRecieveLabController@DataWard');
    Route::get('/resultCopyScan/SelectLab','MainResultCopyController@SelectLab');
    Route::get('/resultCopyScan/SelectLabData/{labID}','MainResultCopyController@SelectLabData');
    Route::get('/DataPatientLabOrder/{id}','MainRecieveLabController@DataPatientLabOrder');
    Route::get('/DataHospitalLabOrder/{id}','MainRecieveLabController@DataHospitalLabOrder');
    /**get hospital */
    Route::get('/getHospital','MainRecieveLabController@getHospital');
    Route::get('/DataDepartmentLabOrder/{id}','MainRecieveLabController@DataDepartmentLabOrder');
    Route::get('/DataClinicLabOrder/{id}','MainRecieveLabController@DataClinicLabOrder');
    Route::get('/DataDoctorLabOrder/{id}','MainRecieveLabController@DataDoctorLabOrder');
    Route::get('/DataServicePlanLabOrder/{id}','MainRecieveLabController@DataServicePlanLabOrder');
    Route::get('/DataWardLabOrder/{id}','MainRecieveLabController@DataWardLabOrder');
    Route::get('/LabSubGroupItem','MainRecieveLabController@LabSubGroupItem');
    Route::get('/SelectLabSubGroupItem/{datalab}','MainRecieveLabController@SelectLabSubGroupItem');
    Route::get('/SelectLabItemcodeType/{itemcode}','MainRecieveLabController@SelectLabItemcodeType');
    Route::get('/SelectLabItemType/{datalab}','MainRecieveLabController@SelectLabItemType');
    Route::get('/SelectLabSubGroupItemById/{id}','MainRecieveLabController@SelectLabSubGroupItemById');
    Route::get('/LabSubGroupItemEdit','MainRecieveLabController@LabSubGroupItem');
    /**
     * #############
     *  add patient
     * ############
     */
    Route::post('/uploadFile','MainResultCopyController@uploadFile')->name('main.uploadFile');
    Route::post('/AddLabOrder','MainRecieveLabController@AddLabOrder')->name('main.AddLabOrder');
    Route::post('/AddLabOrderDetail','MainRecieveLabController@AddLabOrderDetail')->name('main.AddLabOrderDetail');
    Route::post('/EditLabOrder','MainRecieveLabController@EditLabOrder')->name('main.EditLabOrder');
    Route::post('/EditLabOrderDetail','MainRecieveLabController@EditLabOrderDetail')->name('main.EditLabOrderDetail');

    Route::post('/UpdateLabOrder','MainRecieveLabController@UpdateLabOrder')->name('main.UpdateLabOrder');

    Route::get('/SelectLabOrderMain','MainRecieveLabController@SelectLabOrderMain');

    Route::get('/GetAppointmentById/{id}','MainRecieveLabController@GetAppointmentById');
    /**################
     * serach by date
     * ################
     */
    Route::get('/getLabOrder','MainRecieveLabController@getLabOrder');
    /**
     * ################
     * RecieveLab click order main
     * ################
     */
    Route::get('/SelectIDLabOrderMain/{id}','MainRecieveLabController@SelectIDLabOrderMain');
    Route::get('/GetDataRejected/{id}','MainRecieveLabController@GetDataRejected');
    Route::get('/SelectIDLabOrderMainPatiant/{id}','MainRecieveLabController@SelectIDLabOrderMainPatiant');
     //save appointment
    Route::post('/recieveLab/saveappointment','MainRecieveLabController@SaveAppointment')->name('recieveLab.SaveAppointment');
    Route::post('/recieveLab/saverejectspeciment','MainRecieveLabController@SaveRejectSpeciment')->name('recieveLab.SaveRejectSpeciment');
    /**
     * #######################
     * ng-click receive-lab-order
     * #######################
     */
    Route::get('/ReceiveLabOrderByBarcode/{barcode}','MainRecieveLabController@ReceiveLabOrderByBarcode')->name('main.ReceiveLabOrderByBarcode');
    Route::get('/ReceiveLabOrder/{id}','MainRecieveLabController@ReceiveLabOrder')->name('main.ReceiveLabOrder');
    Route::get('/RecieveEditLabOrderDetail/{id}','MainRecieveLabController@RecieveEditLabOrderDetail')->name('main.RecieveEditLabOrderDetail');
    Route::get('/DeleteLabOrder/{id}','MainRecieveLabController@DeleteLabOrder')->name('main.DeleteLabOrder');
    Route::get('/RejectSpeciment/{id}','MainRecieveLabController@RejectSpeciment')->name('recieveLab.RejectSpeciment');
    Route::get('/resultDocumentPhoto/SelectLabData/{labID}','MainResultDocumentPhotoController@SelectLabData');
    Route::get('/printImage','MainResultDocumentPhotoController@printImage');
    Route::post('/printImage2','MainResultCopyController@printImage');
    /**
     * ##############
     * Recorded Results Lab
     * ##############
     */
    Route::get('/DataRecordedResults','MainRecordedResultsController@DataRecordedResults');
    Route::get('/DataRedRecordedResults','MainRecordedResultsController@DataRedRecordedResults');
    Route::get('/DataPatient/{id}','MainRecordedResultsController@DataPatient');
    //Route::get('/DataRecordedResultsByDate/{date1}/{date2}','MainRecordedResultsController@DataRecordedResultsByDate');
    /**search */
    Route::get('/getLabResult','MainRecordedResultsController@getLabResult');
    Route::get('/DataRecordedResultsByStatus/{status}','MainRecordedResultsController@DataRecordedResultsByStatus');
    Route::get('/DataRecordedResultsByStatusTest/{status}','MainRecordedResultsController@DataRecordedResultsByStatusTest');
    Route::get('/DataLabDetail/{id}','MainRecordedResultsController@DataLabDetail');
    Route::get('/appointmentMaxValue/{id}','MainRecordedResultsController@appointmentMaxValue');
    Route::post('/updateResult','MainRecordedResultsController@updateResult');
	Route::post('/updateGRFResult','MainRecordedResultsController@updateGRFResult');
    Route::get('/ConfirmResult/{id}/{idmain}/{resultlab}','MainRecordedResultsController@ConfirmResult');
    Route::post('/ConfirmResult','MainRecordedResultsController@ConfirmResults');
    //Route::get('/UpdateResult/{id}/{resultlab}','MainRecordedResultsController@UpdateResult');
    Route::get('/AutoResult/{id}','MainRecordedResultsController@AutoResult');
    Route::post('/AllRepeat','MainRecordedResultsController@AllRepeat');
    Route::get('/Repeat','MainRecordedResultsController@Repeat');
    Route::get('/transfer','MainRecordedResultsController@transfer');
    Route::post('/transfer','MainRecordedResultsController@totalTransfer');
    Route::get('/resultDocumentPhoto/SelectLab','MainResultDocumentPhotoController@SelectLab');
    Route::post('/recordedResults/critical','MainRecordedResultsController@critical');
    Route::post('/recordedResults/cancel','MainRecordedResultsController@cancel');
    Route::post('/recordedResults/authorized','MainRecordedResultsController@authorized');
    Route::post('/cancelApprove','MainRecordedResultsController@cancelApprove');

});

// Route QC
Route::prefix('/QC')->group(function () {
    Route::get('/QCConfig','QCconfigController@index');
    Route::get('/QCInput','QCinputController@index');
    Route::get('/QCInput/listdata-profile/{id}','QCinputController@dataprofile');
    Route::get('/QCInput/listall-profile/{id}','QCinputController@listall');
    Route::get('/QCInput/delete-profile/{id}','QCinputController@deleteProfile');
    Route::get('/QCInput/listItem-profile/{idscrop}/{id}','QCinputController@listItem');
    Route::get('/QCInput/listResultCM/{id}','QCinputController@listResultCM');
    Route::post('/QCInput/AddItemList','QCinputController@AddItemList')->name('QCinput.AddItemList');
    Route::get('/QCInput/printQCpdf/{id}','QCinputController@PrintQCLab');

    Route::get('/QCSetup','QCsetupController@index');
    Route::get('/QCViewer','QCviewerController@index');
    Route::get('/QCtest','QCviewerController@AAA');
    Route::get('/QCjson','QCviewerController@getjson');

    Route::get('/QCViewer/Qc-allProfile','QCviewerController@viewProfile');
    Route::get('/QCViewer/getLevel','QCviewerController@getLevel');
    Route::get('/QCViewer/getQcName','QCviewerController@getQcName');

    Route::get('/QCViewer/QcResultData','QCviewerController@viewQcResultData');
    Route::get('/QCViewer/QcResultDataFillter','QCviewerController@viewQcResultDataFillter');

    Route::get('/Qc-list-name','QCsetupController@listname');
    Route::get('/Qc-list-level','QCsetupController@listlevel');
    Route::get('/Qc-list-department','QCsetupController@listdepartment');
    Route::get('/Qc-add-profilemaster/{profile}/{department}/{qcname}/{qclevel}/{lot}/{iduser}/{idhospital}','QCsetupController@AddProfile');
    Route::get('/Qc-allProfile','QCsetupController@allProfile');
    Route::get('/Qc-listgroupitem','QCsetupController@listgroupitem');

    Route::get('/AddEditItemProfileItemDetail','QCsetupController@AddEditProfileItemDetail')->name('QC-setup-EditProfileItem');

    Route::get('/Qc-selected/{id}','QCsetupController@Selecteditem');
    Route::get('/Qc-listProfileID/{id}','QCsetupController@listProfileID');
    Route::get('/Qc-DeleteProfileID/{id}','QCsetupController@DeleteProfileID');
    Route::get('/QueryItem/{id}','QCsetupController@QueryItem');
    Route::get('/QueryItemProfile/{id}','QCsetupController@QueryItemProfile');
    Route::get('/QueryItemCompare/{id}/{id_qc_level}','QCsetupController@QueryItemCompare');
    Route::get('/AddItemProfileItemDetail','QCsetupController@AddProfileItemDetail')->name('QC.AddprofileitemDetail');
    Route::get('/Qc-setup/EditProfile','QCsetupController@EditProfile')->name('QC-setup-EditProfile');
});

// Route::get('/Welcome', 'HomeController@index');

Route::prefix('/login')->group(function () {
    Route::post('/','LoginController@index')->name('Login.user');
    Route::get('/listSession/{username}','LoginController@listjson')->name('Login.json');
    Route::get('/logout','LoginController@logout')->name('login.logout');
});
