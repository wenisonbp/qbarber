<?php

include __DIR__ . '/db.php';

if ($params = resolve('/')) {
    render('site/index', 'site');
}

elseif ($params = resolve('/contatos')) {
    render('site/contatos', 'site');
}

elseif ($params = resolve('/quem_somos')) {
    render('site/quem_somos', 'site');
} 

elseif ($params = resolve('/junte_se_a_nos')) {
    render('site/junte_se_a_nos', 'site');
}

elseif ($params = resolve('/realizar_cadastro')){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($cadastro_barbearia()) {
            flash('Cadastro com sucesso', 'success');
            return header('location: /barbearia/barbeiro/inicio');
        }
        if ($cadastro_cliente()) {
            flash('Cadastro com sucesso', 'success');
            return header('location: /barbearia/cliente/inicio');
        }
        flash('Preencha todos os dados', 'error');
    }
    render('site/cadastro', 'site');
}

else {
    echo 'Página não encontrada';
}