{{-- <div class="navbar">
    <div class="navbar-inner">

        <a href="/logout">LOGOUT</a>
    </div>
</div> --}}
<nav class="navbar navbar-dark bg-primary .text-justify">
<a class="navbar-brand">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
<a class="logout" href="/logout">LOGOUT</a>
</nav>
