
<nav>
    <h2>Laptop Store</h2>

    <div>
        <a href="/">Laptop List</a>
        <a href="/create-laptop">Add Laptop</a>
    </div>
    <form action="/logout" method="POST">
    @csrf
        <button type="submit">Logout</button>
    </form>
</nav>

<style>
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
        padding: 10px 25px;
        margin-bottom: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    nav h2 {
        color: #2563eb;
        margin: 0;
    }

    nav a {
        text-decoration: none;
        color: #333;
        margin-left: 20px;
        font-size: 14px;
    }

    nav a:hover {
        color: #2563eb;
    }
    
    nav div {
        margin-bottom: 0;
    }
</style>
