
                        
             function numeros(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key);
                numero = "0123456789";
                especial = "8-37-38-46";
                tecEspecial = false;

                //este ciclo é para verificar o caso de apagar o teclado
                for (var i in especial) {
                    if (key == especial[i]) {
                        tecEspecial = true;
                    }
                }
                if (numero.indexOf(tecla) == -1 && !tecEspecial) {
                    return false;

                }
            }

