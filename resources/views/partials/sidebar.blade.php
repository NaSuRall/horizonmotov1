<style>
    nav {
        height: 100vh;
        width: 100%;
        background-color: var(--bg);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        font-family: "Roboto", sans-serif;
        border-right: 1px solid var(--text-color);
    }

    .nav-header {
        padding: 20px;
        text-align: center;
        border-bottom: 1px solid var(--text-color);
    }

    .nav-header img {
        max-width: 60%;
        height: auto;
    }


    .onglets {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        width: 100%;
        padding: 12px 20px; 
    }
    .nav-body {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 20px 0;
        width: 100%;
    }

    .row {
        width: 100%;
        display: flex;
        align-items: stretch;
    }

    .nav-body .onglets a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        width: 100%;
        box-sizing: border-box;
        gap: 10px;
    }

    .nav-body .onglets a:hover {
        background-color: var(--primary-color);
    }

    .nav-footer {
        padding: 20px;
        border-top: 1px solid var(--text-color);
        text-align: center;
    }

    .nav-footer a {
        color: white;
        text-decoration: none;
    }

    .nav-footer a:hover {
        text-decoration: underline;
    }

    .icon-left {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        min-width: 24px;
    }
    .label {
        flex: 1;
        text-align: left;
        padding: 0 8px;
    }
    .icon-right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        min-width: 24px;
    }




</style>

<nav>
    <div>
<div class="nav-header">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
    </div>
    <div class="nav-body">
        <div class="onglets">
                <div class="row">
                    <a href="{{ route('dashboard.index') }}">
                        <span class="icon-left"><i class="fa-solid fa-gauge"></i></span>
                        <span class="label">Tableau de bord</span>
                        <span class="icon-right"><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
                <div class="row">
                    <a href="">
                        <span class="icon-left"><i class="fa-solid fa-box"></i></span>
                        <span class="label">Produits</span>
                        <span class="icon-right"><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
                <div class="row">
                    <a href="">
                        <span class="icon-left"><i class="fa-solid fa-tag"></i></span>
                        <span class="label">Marques</span>
                        <span class="icon-right"><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
                <div class="row">
                    <a href="">
                        <span class="icon-left"><i class="fa-solid fa-th"></i></span>
                        <span class="label">Catégories</span>
                        <span class="icon-right"><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
                <div class="row">
                    <a href="">
                        <span class="icon-left"><i class="fa-solid fa-users"></i></span>
                        <span class="label">Utilisateurs</span>
                        <span class="icon-right"><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
        </div>
    </div>
</div>

    <div class="nav-footer">
        <a href="{{ route('home') }}">Retour au site</a>
    </div>
</nav>