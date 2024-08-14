<template>
    <div class="w-[95%] m-auto absolute top-3 ">
       
        <Link :href="route('dashboard')" as="button" type="button" method="get"
              :class="{'bg-gray-600': $page.component === 'AllowedPages/Dashboard', 'bg-gray-800': $page.component !== 'AllowedPages/Dashboard'}"
              class="w-[100%] h-[40px]  text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600">
             Dashboard
        </Link>
        <Link :href="route('mails.index')" as="button" type="button" method="get"
              :class="{'bg-gray-600': $page.component === 'AllowedPages/Home', 'bg-gray-800': $page.component !== 'AllowedPages/Home'}"
              class="w-[100%] h-[40px]  text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600">
            Home
        </Link>

        <Link :href="route('users.index')" as="button" type="button" method="get"
              :class="{'bg-gray-600': $page.component === 'AllowedPages/User', 'bg-gray-800': $page.component !== 'AllowedPages/User'}"
              class="w-[100%] h-[40px]  text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600">
            Users
        </Link>

        <Link
        :href="route('products.index')"
        as="button"
        type="button"
        method="get"
        :class="{
          'bg-gray-600': $page.component === 'AllowedPages/Product' || $page.component === 'AllowedPages/Tools/CreateProduct',
          'bg-gray-800': $page.component !== 'AllowedPages/Product'
        }"
        class="w-[100%] h-[40px] text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600"
      >
        Products
      </Link>
      
        <Link
        :href="route('customers.index')"
        as="button"
        type="button"
        method="get"
        :class="{
          'bg-gray-600': $page.component === 'AllowedPages/Customer' || $page.component === 'AllowedPages/Tools/CreateCustomer',
          'bg-gray-800': $page.component !== 'AllowedPages/Customer'
        }"
        class="w-[100%] h-[40px] text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600"
      >
        Customers
      </Link>

      
        <Link
        :href="route('videos.index')"
        as="button"
        type="button"
        method="get"
        :class="{
          'bg-gray-600': $page.component === 'AllowedPages/Video' || $page.component === 'AllowedPages/Tools/CreateVideo',
          'bg-gray-800': $page.component !== 'AllowedPages/Video'
        }"
        class="w-[100%] h-[40px] text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 hover:bg-gray-600 active:bg-gray-600"
      >
        Videos
      </Link>

      

        <Link :href="route('logout.store')" as="button" type="button" method="post"
              class="w-[100%] h-[40px]  text-center px-3 rounded-sm mb-2 transition-all ease-out duration-500 bg-gray-800 hover:bg-gray-600 active:bg-gray-600">
            Logout
        </Link>
    </div>
</template>
