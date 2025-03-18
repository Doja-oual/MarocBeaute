<aside class="sidebar">
    <div class="logo">
        <h1>MOROCCAN<br>COSMETICS</h1>
    </div>
    <ul class="nav-menu">
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <i>📊</i> <a href="{{ route('dashboard.index') }}">Tableau de bord</a>
    </li>
    <li class="nav-item {{ request()->is('produits*') ? 'active' : '' }}">
        <i>📦</i> <a href="{{ route('produits.produit') }}">Produits</a>
    </li>
    <li class="nav-item {{ request()->is('categories-tags*') ? 'active' : '' }}">
        <i>🏷️</i> <a href="{{ route('categories.category') }}">Catégories </a>
    </li>
    <li class="nav-item {{ request()->is('commandes*') ? 'active' : '' }}">
        <i>🛒</i> <a href="{{ route('commandes.orders') }}">Commandes</a>
    </li>
    <li class="nav-item {{ request()->is('paiements*') ? 'active' : '' }}">
        <i>💳</i> <a href="{{ route('paiements.paiement') }}">Paiements</a>
    </li>
    <li class="nav-item {{ request()->is('livraisons*') ? 'active' : '' }}">
        <i>🚚</i> <a href="{{ route('livraisons.livraison') }}">Livraisons</a>
    </li>
    <li class="nav-item {{ request()->is('client*') ? 'active' : '' }}">
        <i>👥</i> <a href="{{ route('client.client') }}">Clients</a>
    </li>
    <li class="nav-item {{ request()->is('Artisans*') ? 'active' : '' }}">
        <i>👨‍🎨</i> <a href="#">Artisans</a>
    </li>
    <li class="nav-item {{ request()->is('reviews*') ? 'active' : '' }}">
        <i>⭐</i> <a href="{{ route('reviews.review') }}">Avis</a>
    </li>
    <li class="nav-item {{ request()->is('Blog*') ? 'active' : '' }}">
        <i>📝</i> <a href="#">Blog</a>
    </li>
    <li class="nav-item {{ request()->is('parametres*') ? 'active' : '' }}">
        <i>⚙️</i> <a href="{{ route('parametres.parametre') }}">Parametres</a>
    </li>
</ul>
</aside>
