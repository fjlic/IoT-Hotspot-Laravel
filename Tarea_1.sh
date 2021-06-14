#funMenu=(dialog --separate-output --checklist "Selecciona la opcion deseada para BD Galex:" 0 0 0)
funMenu=(dialog --clear --backtitle "Francisco Javie Flores Zermeño" --title "Menu principal" --separate-output --checklist "Selecciona la opcion deseada para BD Galex:" 0 0 0)
opciones=(1 "Crear BD Galex" off 2 "Poblar BD" off 3 "Restablecimiento por Default" off)
selecciones=$("${funMenu[@]}" "${opciones[@]}" 2>&1 >/dev/tty)
clear
OK="OK"
for seleccion in $selecciones
do
 case $seleccion in
 1)
 #echo "php artisan migrate"
 FechaInicio=$(date)
 Usuario=$(who)
 Variable=$(php artisan migrate | grep completed: | awk '{print $2}')
 $Variable
 FechaFin=$(date)
 echo -e "(Incio: $FechaInicio)" >> IOT-Hotspot.log
 echo -e "(Usuario:$Usuario)" >> IOT-Hotspot.log
 echo -e "(Variable:php artisan migrate)" >> IOT-Hotspot.log
 echo -e "(Fin:$FechaFin)" >> IOT-Hotspot.log
 echo -e "(Status:$OK)" >> IOT-Hotspot.log
 echo -e "#################################################" >> IOT-Hotspot.log
 ;;
 2)
 #echo "php artisan db:seed"
 FechaInicio=$(date)
 Usuario=$(who)
 Variable=$(php artisan db:seed | grep completed: | awk '{print $2}')
 $Variable
 FechaFin=$(date)
 echo -e "(Incio: $FechaInicio)" >> IOT-Hotspot.log
 echo -e "(Usuario:$Usuario)" >> IOT-Hotspot.log
 echo -e "(Variable:php artisan db:seed)" >> IOT-Hotspot.log
 echo -e "(Fin:$FechaFin)" >> IOT-Hotspot.log
 echo -e "(Status:$OK)" >> IOT-Hotspot.log
 echo -e "#################################################" >> IOT-Hotspot.log
 ;;
 3)
 #echo "php artisan migrate:fresh --seed"
 FechaInicio=$(date)
 Usuario=$(who)
 Variable=$(php artisan migrate:fresh --seed | grep completed: | awk '{print $2}')
 $Variable
 FechaFin=$(date)
 echo -e "(Incio: $FechaInicio)" >> IOT-Hotspot.log
 echo -e "(Usuario:$Usuario)" >> IOT-Hotspot.log
 echo -e "(Variable:php artisan migrate:fresh --seed)" >> IOT-Hotspot.log
 echo -e "(Fin:$FechaFin)" >> IOT-Hotspot.log
 echo -e "(Status:$OK)" >> IOT-Hotspot.log
 echo -e "#################################################" >> IOT-Hotspot.log
 ;;
 esac
done

