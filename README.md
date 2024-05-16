## Comandos del proyecto
1. Levantar proyecto
```
./vendor/bin/sail up
```

o con docker 
```
sail up
```

* Detener contenedor
```
./vendor/bin/sail down
```

o con docker 
```
sail up
```


2. Iniciar con vite 
```
./vendor/bin/sail npm run dev 
```

o con docker
```
sail npm run dev 
```

Nota: Si no se quiere usar docker simplemente no se utiliza sail en los comandos

## Para utilizar el alias de Sail
En MAC
```
nano ~/.zshrc
```

Agregar el siguiente comando
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```




