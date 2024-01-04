<?php 
  use core\classes\Store;
?>

<div class="bg-slate-600 text-white shadow-2xl">

    <div class="flex justify-between pl-6 pr-8 p-11">
        <h1><a href="?a=inicio"> <?= APP_NAME ?> </a></h1>

        <ul>
            <li>
                <a href="?a=inicio" class="m-2">Inicio</a>
                <a href="" class="m-2">Produtos</a>
                <a href="" class="m-2">Fale conosco</a>

            <?php
            if (Store::verifica_sessao_usuario()) : ?>
                <a href="" class="m-2">Minha Conta</a>
                <a href="" class="m-2">Sair da conta</a>
            <?php else : ?>
                <a href="?a=cadastro" class="m-2">Criar uma conta</a>
                <a href="" class="m-2">Entrar na conta</a>
            <?php endif; ?>
                <a href="?a=carrinho"><i class="fa-solid fa-cart-shopping text-2xl "></i></a>
            </li>
        </ul>
    </div>
</div><!--- Div principal--->
