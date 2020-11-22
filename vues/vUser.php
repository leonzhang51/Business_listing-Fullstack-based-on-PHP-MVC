<?php $this->titre = "Sireta community business user interface"; ?>

<?php $userIdentity=1; //user id ?>

<div class="section large transparent dark text-center" style="background-image: url('images/homepage_background1.jpg');">
            <div class="inner">
                <div class="container">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monProduit">Add Product or Service</button>
                    
                    <!-- Le Modal Pour créer un nouveau produit-->
                    <div class="modal" id="monProduit" >
                        <div class="modal-dialog" >
                            <div class="modal-content" style="background-image: url('images/background01.jpg');">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h1 class="modal-title">Add new product</h1>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="user?action=addProduct" method="post" enctype="multipart/form-data">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <br>
                                        <span>Please select product or service you want to add</span>
                                        <select name="productOrService" required>
                                            <option></option>
                                            <option value="product">Product</option>
                                            <option value="service">Service</option>
                                        </select>
                                        
                                        <br>
                                        <span>The name of product/service</span>
                                        <input type="text" name="nomProduit" required>
                                        <br>
                                        <span>Description</span>
                                        <textarea name="produitDescription" required></textarea>
                                        <br>

                                        <span>select a photo to upload (less than 2 Mb):</span>
                                        <input type="file" name="produitImgUpload[]" id="fileToUpload" multiple>
                                        <br>
                                        <span>price/hour rate</span>
                                        <input type="text" name="produitPrix" required>
                                        <br>
                                        <span>Choose category </span>
                                        <br>
                                        <select name="produitCategories">
                                            <option>Choose category</option>
                                            <?php if(isset($datas['subcategory'])): ?>
                                                <?php foreach($datas['subcategory'] as $subcategory): ?>

                                                <option value=<?php echo $subcategory['id'] ?>><?php echo $subcategory['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br>
                                        <input type="hidden" name="idbizUser" value='<?php echo $userIdentity;  ?>' readonly>

                                        


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="submit" name="submitProduit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal create product/service-->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monAD">Add product AD </button>
                    
                    <!-- Le Modal Pour create new AD-->
                    <div class="modal" id="monAD" >
                        <div class="modal-dialog" >
                            <div class="modal-content" style="background-image: url('images/background01.jpg');">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h1 class="modal-title">Add new AD</h1>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="user?action=addAD" method="post" enctype="multipart/form-data">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <br>
                                        
                                        <select name="type" required>    
                                            <option value="product">Product</option>
                                        </select>
                                        
                                        <br>
                                        <span>The name of AD</span>
                                        <input type="text" name="name" required>
                                        <br>
                                        <span>Date</span>
                                        <input type="date" name="date" required>
                                        <br>
                                        <span>Choose product/service </span>
                                        <br>
                                        <select name="idproduct">
                                            <option>Choose product</option>
                                            <?php if(isset($datas['productUser'])): ?>
                                                <?php foreach($datas['productUser'] as $productUser): ?>

                                                <option value=<?php echo $productUser['idproduct'] ?>><?php echo $productUser['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br>
                                        <select name="idcity">
                                            <option>Choose city</option>
                                            <?php if(isset($datas['city'])): ?>
                                                <?php foreach($datas['city'] as $city): ?>

                                                <option value=<?php echo $city['idcity'] ?>><?php echo $city['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br>
                                        <input type="hidden" name="idbizUser" value='<?php echo $userIdentity;  ?>' readonly>

                                        


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="submit" name="submitAD">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal create product AD-->
                
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monServiceAD">Add service AD </button>
                    
                    <!-- Le Modal Pour create new AD-->
                    <div class="modal" id="monServiceAD" >
                        <div class="modal-dialog" >
                            <div class="modal-content" style="background-image: url('images/background01.jpg');">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h1 class="modal-title">Add new AD</h1>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="user?action=addAD" method="post" enctype="multipart/form-data">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <br>
                                        
                                        <select name="type" required>    
                                            <option value="service">Service</option>
                                        </select>
                                        
                                        <br>
                                        <span>The name of AD</span>
                                        <input type="text" name="name" required>
                                        <br>
                                        <span>Date</span>
                                        <input type="date" name="date" required>
                                        <br>
                                        <span>Choose service </span>
                                        <br>
                                        <select name="idproduct">
                                            <option>Choose service</option>
                                            <?php if(isset($datas['serviceUser'])): ?>
                                                <?php foreach($datas['serviceUser'] as $serviceUser): ?>

                                                <option value=<?php echo $serviceUser['idservice'] ?>><?php echo $serviceUser['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br>
                                        <select name="idcity">
                                            <option>Choose city</option>
                                            <?php if(isset($datas['city'])): ?>
                                                <?php foreach($datas['city'] as $city): ?>

                                                <option value=<?php echo $city['idcity'] ?>><?php echo $city['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br>
                                        <input type="hidden" name="idbizUser" value='<?php echo $userIdentity;  ?>' readonly>

                                        


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="submit" name="submitAD">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal create service AD-->
                
                <!-- start .directory-list for product-->
                <h3 style="color:white">created product</h3>
                    <div class="directory-list row">
                        <?php foreach($datas['product'] as $product): ?>
                            <div class="col-sm-4">
                                <div class="directory-item">
                                    <img src="<?php echo $product['photo'] ?>" alt="bg" class="img-responsive">
                                    <div class="overlay"></div>
                                    <div class="rating">4.0</div>
                                    <a href="" class="wishlist"><img src="images/directory-heart.png" alt="wishlist"></a>
                                    <div class="content">
                                        <h3><a href=""><?php echo $product['name'] ?></a></h3>
                                        <p><?php echo $product['description'] ?></p>
                                        <p>$<?php echo $product['price'] ?></p>
                                        <div class="location"><img src="images/directory-location.png" alt="location">Thomas St , Montreal</div>
                                    </div> <!-- end .content -->
                                    <div class="category">
                                        <a href=""><img src="images/directory-category-food.png" alt="food"></a>
                                        <a href=""><img src="images/directory-category-drink.png" alt="drink"></a>
                                    </div> <!-- end .category -->
                                </div> <!-- end .directory-item -->
                            </div> <!-- end .col-sm-6 -->

                        <?php endforeach; ?>
                            


						
                    </div> <!-- end .directory-list for product-->
                    
                    <!-- end .directory-list for service-->
                    <h3 style="color:white">created service</h3>
                    <div class="directory-list row">
                        <?php foreach($datas['service'] as $service): ?>
                            <div class="col-sm-4">
                                <div class="directory-item">
                                    <img src="<?php echo $service['photo'] ?>" alt="bg" class="img-responsive">
                                    <div class="overlay"></div>
                                    <div class="rating">4.0</div>
                                    <a href="" class="wishlist"><img src="images/directory-heart.png" alt="wishlist"></a>
                                    <div class="content">
                                        <h3><a href=""><?php echo $service['name'] ?></a></h3>
                                        <p><?php echo $service['description'] ?></p>
                                        <p>$<?php echo $service['price'] ?>/hr</p>
                                        <div class="location"><img src="images/directory-location.png" alt="location">Thomas St , Montreal</div>
                                    </div> <!-- end .content -->
                                    <div class="category">
                                        <a href=""><img src="images/directory-category-food.png" alt="food"></a>
                                        <a href=""><img src="images/directory-category-drink.png" alt="drink"></a>
                                    </div> <!-- end .category -->
                                </div> <!-- end .directory-item -->
                            </div> <!-- end .col-sm-6 -->

                        <?php endforeach; ?>
                            


						
					</div> <!-- end .directory-list for service-->
                </div>
            </div>
            
</div>


