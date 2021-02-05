<?php $this->layout('shared/template', ['title' => 'Home'])?>

<?php $this->start('conteudo')?>
    <h1>Bem vindo a Home</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <?php if (isset($_SESSION['auth'])):?>
    <p>Logado</p>
    <?php endif;?>
<?php $this->end()?>
