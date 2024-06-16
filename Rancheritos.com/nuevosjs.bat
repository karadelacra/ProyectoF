@REM { "id": 1, "name": "tacos", "types": [{ "slot": 1, "type": { "name": "side" } }, { "slot": 2, "type": { "name": "mexican" } }], "image": "https://cdn.pixabay.com/photo/2017/06/02/18/24/tacos-2360937_960_720.jpg" }
@REM { "id": 2, "name": "tortas", "types": [{ "slot": 1, "type": { "name": "side" } }, { "slot": 2, "type": { "name": "mexican" } }], "image": "https://cdn.pixabay.com/photo/2017/06/02/18/24/tacos-2360937_960_720.jpg" }
@REM { "id": 3, "name": "tamales", "types": [{ "slot": 1, "type": { "name": "side" } }, { "slot": 2, "type": { "name": "mexican" } }], "image": "https://cdn.pixabay.com/photo/2017/06/02/18/24/tacos-2360937_960_720.jpg" }
@REM { "id": 4, "name": "tostadas", "types": [{ "slot": 1, "type": { "name": "side" } }, { "slot": 2, "type": { "name": "mexican" } }], "image": "https://cdn.pixabay.com/photo/2017/06/02/18/24/tacos-2360937_960_720.jpg" }
@REM { "id": 5, "name": "pozole", "types": [{ "slot": 1, "type": { "name": "side" } }, { "slot": 2, "type": { "name": "mexican" } }], "image": "https://cdn.pixabay.com/photo/2017/06/02/18/24/tacos-2360937_960_720.jpg" }



@REM se crearán los archivos de los platillos en la carpeta actual y contendrán la información de los platillos con nombre de archivo 1.json, 2.json, 3.json, etc. con un máximo de 5 platillos

@echo off
setlocal enabledelayedexpansion

set count=0
for /f "tokens=*" %%a in (nuevosjs.bat) do (
    set /a count+=1
    echo %%a > !count!.json
    if !count! EQU 5 goto :end
)
:end

