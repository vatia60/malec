<div class="nav-side-menu">
    <div class="brand">Dashboard</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">

                <li  data-toggle="collapse" data-target="#category" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> Category <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="category">
                    <li><a href="">Manage Category</a></li>
                    <li><a href="">Create Category</a></li>
                    <li><a href="">Update Category</a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> Product <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="products">
                      <li><a href="{{ route('admin.products.index') }}">Manage Product</a></li>
                      <li><a href="{{ route('admin.products.create') }}">Create Product</a></li>
                      <li><a href="#">Update Product</a></li>
                  </ul>

                  <li  data-toggle="collapse" data-target="#brand" class="collapsed active">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> Brand <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="brand">
                      <li><a href="#">Manage Brand</a></li>
                      <li><a href="#">Create Brand</a></li>
                      <li><a href="#">Update Brand</a></li>
                  </ul>

                  <li  data-toggle="collapse" data-target="#division" class="collapsed active">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> Division <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="division">
                      <li><a href="#">Manage Division</a></li>
                      <li><a href="#">Create Division</a></li>
                      <li><a href="#">Update Division</a></li>
                  </ul>

                  <li  data-toggle="collapse" data-target="#district" class="collapsed active">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> Division <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="district">
                      <li><a href="#">Manage Division</a></li>
                      <li><a href="#">Create Division</a></li>
                      <li><a href="#">Update Division</a></li>
                  </ul>

            </ul>
     </div>
</div>
