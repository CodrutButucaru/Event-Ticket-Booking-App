<style>
    header {
        background-color: #3498db;
        padding: 10px;
        text-align: center;
        font-size: 24px;
        color: white;
        position: relative;
    }

    header a {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 10px;
        color: white;
        text-decoration: none;
    }
</style>

<header>

    Panou de Control
    <a href="{{ route('admin.logout') }}">Deconectare</a>

</header>
