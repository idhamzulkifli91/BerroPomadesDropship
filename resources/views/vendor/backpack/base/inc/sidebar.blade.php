@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ Gravatar::get(auth()->user()->email) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->

        @inject('user','App\User')

        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Products</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

              @if($user->shouldBe('admin'))
                 <li><a href="/web/products"><i class="fa fa-circle-o"></i> Product List</a></li>
                @endif
              <li><a href="/web/product/shop"><i class="fa fa-circle-o"></i> Shop</a></li>
              <li><a href="/web/order/me"><i class="fa fa-circle-o"></i> Current Order</a></li>
            </ul>
          </li>

          @if($user->shouldBe('admin'))

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Sales Management</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/web/order/all"><i class="fa fa-circle-o"></i> Orders</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Payment history</a></li>
              </ul>
            </li>
          @endif


          @if($user->shouldBe('admin'))

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Members Management</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/web/users"><i class="fa fa-circle-o"></i> Members</a></li>
              </ul>
            </li>
          @endif


          @if($user->shouldBe('admin'))

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span> Others</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('filemanager.index') }}"><i class="fa fa-circle-o"></i> Material Support</a></li>
                <li><a href="{{ route('news.index') }}"><i class="fa fa-circle-o"></i> Announcement</a></li>
                <li><a href="{{ route('web.inventory.index') }}"><i class="fa fa-circle-o"></i> Stocks</a></li>
                <li><a href="{{ route('web.role_discount.index') }}"><i class="fa fa-circle-o"></i> Discount</a></li>
                <li><a href="{{ route('web.setting.index') }}"><i class="fa fa-cogs"></i> Setttings</a></li>
              </ul>
            </li>
          @endif


          @if(! $user->shouldBe('admin'))

          @endif
          <li class="header">USER'S MATERIAL SUPPORT</li>
          <li><a href="{{ route('filemanager.material-support') }}"><i class="fa fa-file"></i> Download</a></li>


          <li class="header"> SHOPPING CART</li>
          <li><a href="{{ route('web.product.shop.checkout') }}"><i class="fa fa-shopping-cart"></i> <span> Cart   <small class="label pull-right bg-red"> {{
              \App\OrderItem::where('user_id',auth()->user()->id)->where('status',0)->count()
          }}</small>
            </span></span> </a> </li>


          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>

          <li>
            {!! Form::open(['url' => route('logout')]) !!} }}
              <button type="submit" class="btn btn-link" style="text-decoration: none; color: #b8c7ce;"> <i class="fa fa-sign-out"> </i> Logout</button>
            </form>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
