<!doctype html>
<html lang="en">
<head>
<x-head/>
</head>
<body>
<section id="container">
    <header class="header black-bg">
        <x-header/>
    </header>
    <aside>
        <x-sidebar/>
    </aside>
    <section id="main-content">
        @yield('content')

    </section>

</section>
</body>
</html>
