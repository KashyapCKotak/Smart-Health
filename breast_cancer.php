<style>
    body {
        min-height: 2300px;
    }

    .content-header b,
    .allcp-form .panel.heading-border:before,
    .allcp-form .panel .heading-border:before {
        transition: all 0.7s ease;
    }

    @media (max-width: 800px) {
        .allcp-form .panel-body {
            padding: 18px 12px;
        }

        .option-group .option {
            display: block;
        }

        .option-group .option + .option {
            margin-top: 8px;
        }
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Breast Cancer Check
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Services</li>
        <li class="active">Breast Cancer Check</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Breast Cancer Check</h3>
                </div>
                
                <form method="post" action="breast_cancer_result.php" id="allcp-form" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-lable">First Name</label>
                                            <input type="text" name="firstname" id="firstname" <?php if (isset($_SESSION['login_user'])) {echo "value='".$_SESSION['first_name']."'";}?> class="form-control" placeholder="First Name" required>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-lable">Last Name</label>
                                            <input type="text" name="lastname" id="lastname" <?php if (isset($_SESSION['login_user'])) {echo "value='".$_SESSION['last_name']."'";}?> class="form-control" placeholder="Last Name">
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-lable">Age</label>
                                            <input type="number" name="age" id="age" min="1" max="120" class="form-control" placeholder="Age" required>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="field select">Select Gender</label>
                                            <select id="sex" name="sex" class="form-control" required>
                                                <option value="">Sex</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                    </div>
                                </div>
                        </div>

                        <h6 class="mb20" id="spy1">Test Results</h6>
                        <!-- -------------- Test Results -------------- -->
                        <!-- 
                            1. Sample code number            id number
                            2. Clump Thickness               1 - 10
                            3. Uniformity of Cell Size       1 - 10
                            4. Uniformity of Cell Shape      1 - 10
                            5. Marginal Adhesion             1 - 10
                            6. Single Epithelial Cell Size   1 - 10
                            7. Bare Nuclei                   1 - 10
                            8. Bland Chromatin               1 - 10
                            9. Normal Nucleoli               1 - 10
                            10. Mitoses                       1 - 10
                            11. Class:                        (2 for benign, 4 for malignant)
                        -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Benign cells tend to be grouped in monolayers, while cancerous cells are often grouped in multilayers">
                                        <label class="control-lable">Clump Thickness</label></a>
                                            <input type="number" name="clump_thickness" id="clump_thickness" min="1" max="10" class="form-control" placeholder="Clump Thickness (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Cancer cells tend to vary in size and shape. That is why these parameters are vauable in determining whether the cells are cancerous or not">
                                        <label class="control-lable">Uniformity of Cell Size</label></a>
                                            <input type="number" name="uniformity_of_cell_size" id="uniformity_of_cell_size" min="1" max="10" class="form-control" placeholder="Uniformity of Cell Size (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Cancer cells tend to vary in size and shape. That is why these parameters are vauable in determining whether the cells are cancerous or not">
                                        <label class="control-lable">Uniformity of Cell Shape</label></a>
                                            <input type="number" name="uniformity_of_cell_shape" id="uniformity_of_cell_shape" min="1" max="10" class="form-control" placeholder="Uniformity of Cell Shape (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Normal cells tend to stick together. Cancer cells tend to lose this ability. So loss of adhesion is sign of malignancy.">
                                        <label class="control-lable">Marginal Adhesion</label></a>
                                            <input type="number" name="marginal_adhesion" id="marginal_adhesion" min="1" max="10" class="form-control" placeholder="Marginal Adhesion (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="It is related to the uniformity. Epithelial cells that are significantly enlarged may be malignant cells.">
                                        <label class="control-lable">Single Epithelial Cell Size</label></a>
                                            <input type="number" name="single_epithelial_cell_size" id="single_epithelial_cell_size" min="1" max="10" class="form-control" placeholder="Single Epithelial Cell Size (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="This is a term for nuclei that is not surrounded by cytoplasm (the rest of the cell). Those are typically seen in benign tumours.">
                                        <label class="control-lable">Bare Nuclei</label></a>
                                            <input type="number" name="bare_nuclei" id="bare_nuclei" min="1" max="10" class="form-control" placeholder="Bare Nuclei (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Describes a uniform 'texture' of the nucleus seen in benign cells. In cancerous tend to be more coarse">
                                        <label class="control-lable">Bland Chromatin</label></a>
                                            <input type="number" name="bland_chromatin" id="bland_chromatin" min="1" max="10" class="form-control" placeholder="Bland Chromatin (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="Nucleoli are small structures seen in the nucleus. In normal sense nucleolus is usually very small if visible at all. In cancer cells the nucleoli becomes more prominent, and sometimes there are more of them.">
                                        <label class="control-lable">Normal Nucleoli</label></a>
                                            <input type="number" name="normal_nucleoli" id="normal_nucleoli" min="1" max="10" class="form-control" placeholder="Normal Nucleoli (1-10)" step="0.01">
                                        
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="#" data-toggle="tooltip" title="The division of cell nucleus, normally followed by cell division.">
                                        <label class="control-lable">Mitoses</label></a>
                                            <input type="number" name="mitoses" id="mitoses" min="1" max="10" class="form-control" placeholder="Mitoses (1-10)" step="0.01">
                                </div>
                            </div>
                        </div>


                        <div class="panel-footer text-right">
                            <input type="submit" name="submit" value="Submit" class="btn btn-bordered btn-primary mb5"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>