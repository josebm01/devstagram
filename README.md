## Comandos del proyecto
1. Levantar proyecto
```./vendor/bin/sail up``` o con docker  ```sail up```

* Detener contenedor 
```./vendor/bin/sail down``` o con docker ```sail up```


2. Iniciar con vite 
```./vendor/bin/sail npm run dev ``` o con docker ```sail npm run dev ```


## Levantando proyecto sin docker 
Nota: Si no se quiere usar docker simplemente no se utiliza sail en los comandos

1. Levantar proyecto sin docker
```php artisan serve```

2. Levantando vite 
```npm run dev```

3. Creando las migraciones en la base de datos
```php artisan migrate```

## Para utilizar el alias de Sail
En MAC
```
nano ~/.zshrc
```

Agregar el siguiente comando
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```




