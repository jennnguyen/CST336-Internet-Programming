<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1> Technology Center: Checkout System </h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type:
            <select name="deviceType">
                <?=getDeviceTypes()?>    
            </select>
        </form>
    </body>
</html>