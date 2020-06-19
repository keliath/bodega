    $("#generar").click(function(){
        var pdf = new jsPDF();
        pdf.text(20,20,"Mostrando una Tabla con JsPDF");

        var columns = ["Id", "Nombre", "Email", "Pais"];
        var data = [
            [1, "Carlos", "009@gmail.com", "Mexico"],
            [2, "Miguel",  "888@hotmail.com", "Brasil"],
            [3, "Jorge", "jorge@yandex.com", "Ecuador"],
            [3, "mario", "mario@yandex.com", "Colombia"],
        ];

        pdf.autoTable(columns,data,
                      { margin:{ top: 25  }}
                     );

        pdf.save('MiTabla.pdf');

    });

    /*
        $("#generar").click(function(){
            alert("dsds");
            var pdf = new jsPDF();
            pdf.text(20,20,"Mostrando una Tabla con PHP y MySQL");

            var columns = ["Producto", "COmpras", "Ventas", "Stock"];
            var data = [
                <?php foreach($tabla as $c):?>
                [<?php echo $n; ?>, "<?php echo $c->pro_nombre; ?>", "<?php echo $c->compras; ?>", "<?php echo $c->ventas; ?>", "<?php echo $c->stock; ?>"],
                <?php endforeach; ?>  
            ];

            pdf.autoTable(columns,data,
                          { margin:{ top: 25  }}
                         );

            pdf.save('MiTabla.pdf');
        });
*/
