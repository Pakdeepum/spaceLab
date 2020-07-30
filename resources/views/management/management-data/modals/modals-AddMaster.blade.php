<div class="modal fade" ng-controller="listmasterModal" ng-cloak id="modal-addmaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Data</h5>
      </div>
      <div class="modal-body" >
        <div class="row" ng-repeat = "data in listdataAdd">
          <div class="col-lg-12">
          <input type="hidden"  name="id_table" value = "@{{id_table_temp_add}}">
            <div class="row">
                <div class="col-lg-4 text-right">
                    <label>@{{data.table_field_name_show}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="hidden"  name="id_field_add[]" value = "@{{data.table_field_name_use}}">
                    <input type="text"  name="results_add[]" value = "">
                </div>
            </div>
            <br>
          </div>
        </div>    
      </div>
      <div class="modal-footer" >
        <button data-url="{{route('manageData.DataInsert')}}" class="btn save-button" id="Addconfirm"  style="float:left">Accept</button>
        <button class="btn del-button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>