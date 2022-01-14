<?php
require_once "../model/Solteiro.php";

Solteiro::deletar($_GET["id"]);

header("Location: ../listar.php");