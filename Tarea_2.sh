#!/bin/bash
#  Script BASH de Ejemplo de MENU
clear
echo "----------FRANCISCO JAVIER FLORES----------"
echo "----------- CONFIG BASH DB GALEX-----------"
echo "--------------MENU DE OPCIONES-------------"
echo ""
PS3='Opcion a ejecutar: '
options=("Crear BD Galex. 1" "Poblar BD Galex. 2" "Restablcer BD Galex. 3" "Salir. 4")
select opt in "${options[@]}"
do
    case $opt in
        "Crear BD Galex. 1")
            #echo "php artisan migrate"
            OUTPUT="php artisan migrate"
            $OUTPUT
            ;;
        "Poblar BD Galex. 2")
            #echo "php artisan db:seed"
            OUTPUT="php artisan db:seed"
            $OUTPUT
            ;;
        "Restablcer BD Galex. 3")
            #echo "php artisan migrate:fresh --seed"
            OUTPUT="php artisan migrate:fresh --seed"
            $OUTPUT
            ;;
        "Salir. 4")
            break
            ;;
        *) echo invalid option;;
    esac
    echo "----------FRANCISCO JAVIER FLORES----------"
    echo "----------- CONFIG BASH DB GALEX-----------"
    echo "--------------MENU DE OPCIONES-------------"
    echo "---Crear BD Galex. 1" "Poblar BD Galex. 2--"
    echo "----Restablcer BD Galex. 3" "Salir. 4------"
done
