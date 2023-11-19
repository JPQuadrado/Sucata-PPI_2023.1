<?php

// Destrói a sessão
session_destroy();
// Redireciona para a página de índice (ou qualquer outra página que faça sentido para o seu caso)
header("Location: ../index.html");
exit();
