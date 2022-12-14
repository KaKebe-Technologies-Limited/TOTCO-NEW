<!-- Main-Sidebar -->
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index"> <img alt="image" src="assets/img/logo_final.jpg" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Orders</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Sales Orders</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="sales-orders.php">Sales Orders</a></li>
              </ul>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Purchase Orders</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="purchase-orders">Purchase Orders</a></li>
              </ul>
            </li>
            <li class="menu-header">Agent Management</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Agents</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="agents">Agents</a></li>
                <li><a class="nav-link" href="add-new-user">Add New</a></li>
              </ul>
            </li>
            <li class="menu-header">Stock Management</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Store</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="stores">Stores</a></li>
                <li><a class="nav-link" href="create_user">Add New</a></li>
              </ul>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Stock</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="products">Products</a></li>
                <li><a class="nav-link" href="reorder-stock">Reorder Stock</a></li>
              </ul>
            </li>
            <li class="menu-header">Accountability</li>
              <li class="dropdown">
                <a href="transactions" class="menu-toggle nav-link"><span>Transactions</span></a>
              </li>
            </li>
            <li class="menu-header">Manage</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Users</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="users">Manage Users</a></li>
              </ul>
            </li>
            <li class="menu-header">System</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="settings.html">setting1</a></li>
                <li><a class="nav-link" href="card.html">setting2</a></li>
                <li><a class="nav-link" href="modal.html">Setting3</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>

      <script>
        var header = document.querySelector(".sidebar-menu");
        var links = header.getElementsByClassName("nav-link");

        for (var i = 0; i < links.length; i++) {
          links[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
          });
        }
      </script>
      
<!-- End Sidebar -->