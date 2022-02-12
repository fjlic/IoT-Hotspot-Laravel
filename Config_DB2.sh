#!/bin/bash
#  Script BASH de Ejemplo de MENU
clear
echo "-------------------------------------------"
echo "----------- CONFIG BASH DB IOT-HOTSPOT-----------"
echo "--------------MENU DE OPCIONES-------------"
echo ""
PS3='Opcion a ejecutar: '
options=("Crear BD IoT. 1" "Poblar BD IoT. 2" "Restablcer BD IoT. 3" "Salir. 4")
select opt in "${options[@]}"
do
    case $opt in
        "Crear BD IoT. 1")
            #echo "php artisan migrate"
            OUTPUT="php artisan migrate"
            $OUTPUT
            ;;
        "Poblar BD IoT. 2")
            #echo "php artisan db:seed"
            OUTPUT="php artisan db:seed"
            $OUTPUT
            ;;
        "Restablcer BD IoT. 3")
            #echo "php artisan migrate:fresh --seed"
            OUTPUT="php artisan migrate:fresh --seed"
            $OUTPUT
            ;;
        "Salir. 4")
            break
            ;;
        *) echo invalid option;;
    esac
    echo "-------------------------------------------------"
    echo "----------- CONFIG BASH DB IoT-Hotspot-----------"
    echo "--------------MENU DE OPCIONES-------------"
    echo "---Crear BD IoT. 1" "Poblar BD IoT. 2--"
    echo "----Restablcer BD IoT. 3" "Salir. 4------"
done
