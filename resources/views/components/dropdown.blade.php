<style>
.dropdown-menu{
    position: absolute;
    top: 0;
    right: 0;
    padding: 12px 2px;
}
.dropdown {
    display: inline-block;
    position: relative;
}

.dropdown-content {
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    display: none;
    min-width: 160px;
    position: relative;
    z-index: 1;
    padding: 12px 20px;
    border-radius: 4px;
}

.dropdown-content a,
.dropdown-content form{
    margin: 12px 0px;
}
</style>
<div class="dropdown-menu">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" style="background: unset; border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset("img/settings.png") }}" />
        </button>
        <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px 0px 0px;">
                {{ Auth::user()->name }}
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        // Selecione o elemento dropdown
        var dropdown = document.querySelector('.dropdown');

        // Adicione um ouvinte de evento para alternar a exibição do conteúdo do dropdown
        dropdown.addEventListener('click', function (event) {
            var dropdownContent = this.querySelector('.dropdown-content');
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            } else {
                dropdownContent.style.display = 'block';
            }
            event.stopPropagation(); // Impede a propagação do evento para o window click event
        });

        // Feche o dropdown quando o usuário clicar fora dele
        window.addEventListener('click', function (event) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        });
    });
</script>
