<?php include('header.php'); ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
           
           <div class="row" style="min-height:610px;">
               <div class="col-lg-12">
                   <div class="panel panel-info">
                       <div class="panel-heading">
                          <h3 class="panel-title">Newsletter Creation</h3>
                        </div>
                        <div class="panel-body">
                            
                            <label for="">Type : </label>
                            <select name="" id="newsletterSelect">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="properties">Properties</option>
                                <option value="banners">Banners</option>
                            </select>
                            <div class="content">

                                <div class="hide newsletterContent" id="single">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <table class="table table-user-information">
                                    <tbody>
                                      <tr>
                                        <td>Title:</td>
                                        <td><input type="text" name="title">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Upper Text:</td>
                                        <td><textarea name="upper" id="" cols="30" rows="10"></textarea>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Lower Text:</td>
                                        <td>
                                        <textarea name="lower" id="" cols="30" rows="10"></textarea>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Image:</td>
                                        <td><input type="file" name="userfile" required>
                                        </td>
                                      </tr>
                                  </tbody>
                                    </table>
                                    <input type="submit" name="singlepreview" class="btn btn-primary" value="Preview">
                                    </form>
                                </div>
                                <div class="hide newsletterContent" id="banners">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>Title:</td>
                                                    <td><input type="text" name="title">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Upper Text:</td>
                                                    <td><textarea name="upper" id="" cols="30" rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lower Text:</td>
                                                    <td>
                                                    <textarea name="lower" id="" cols="30" rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Banners:</td>
                                                    <td>
                                                        <input type="file" id="file" name="img[]" required>
                                                        <input type="button" id="add_more" class="upload" value="Add More Images"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" name="bannerspreview" class="btn btn-primary" value="Preview">
                                    </form>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="hide newsletterContent" id="properties">
                                    <div class="col-lg-6">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>Title:</td>
                                                    <td><input type="text" name="title">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lower Text:</td>
                                                    <td>
                                                    <textarea name="lower" id="" cols="30" rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>PropertyID:</td>
                                                    <td>
                                                        <input type="number" id="propertyID" name="propertyID">
                                                        <input type="button" id="addMoreIDs" value="Add More Properties">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" name="propertiespreview" class="btn btn-primary" value="Preview">
                                        <div class="row hide" id="numeric_alert" style="width: 100%;margin-top:2%;">
                                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                                Please insert numeric values only.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <table id="propertiesIDs">
                                            <tbody>
                                                <tr>
                                                    <td>Property IDs</td>
                                                    <td>Delete</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </form>
                                
                            </div>
                        </div>
                        <!-- <div class="panel-footer">
                            <input type="submit" name="singlepreview" class="btn btn-primary" value="Preview">
                        </div> -->
                   </div>
               </div>
           </div>
            

        </div>
    </div>
</div>

<?php include('footer.php') ?>