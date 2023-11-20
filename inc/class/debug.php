<?php
    include("dbh.class.php");
    include("usuario-db.class.php");

    $usuarioDB = new UsuarioDB();
    $usuarios = $usuarioDB->listarUsuarios();

    var_dump($usuarios);
    echo json_encode($usuarios);


    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':num_fibra', $num_fibra);
        $stmt->bindParam(':cmdt_code', $cmdt_code);
        $stmt->execute();
  
        if ($stmt->rowCount() > 0) {
          $result = true;
          $stmt = null;
        } 
        else {
          $result = false;
          $stmt = null;
        }
  
        return $result; 
      }    catch (PDOException $erro) {
        $stmt = null;
        header("Location: ../dist/cadastro.php?erro=stmt-failed");
        exit("Erro na conexão:<br>".$erro->getMessage());
      }
?>
<table class="min-w-full border-collapse border border-gray-300 font-poppins">
    <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 py-2 px-4">Nome</th>
            <th class="border border-gray-300 py-2 px-4">Num Fibra</th>
            <th class="border border-gray-300 py-2 px-4">Usuário é Administrador</th>
            <th class="border border-gray-300 py-2 px-4">Código de Administrador</th>
        </tr>
    </thead>
    <tbody id="userTable">

    </tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", () =>  {
        loadUsers();
    });

    function loadUsers() {
    const userTable = document.getElementById("userTable");
    userTable.innerHTML = "";

    // Fazer uma requisição AJAX para obter a lista de usuários
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../class/usuario-db.class.php?action=listarUsuarios", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
        const users = JSON.parse(xhr.responseText);

        // Adicionar cada usuário à tabela
        users.forEach(function (user) {
            const row = userTable.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);

            cell1.textContent = user.usuarios_username;
            cell2.textContent = user.usuarios_num_fibra;
            cell3.textContent = user.usuarios_e_cmdt ? "Sim" : "Não";
            cell4.textContent = user.usuarios_cmdt_cod || "-";
        });
        }
    };

    xhr.send();
    }

</script>