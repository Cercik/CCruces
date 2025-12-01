# API de Contacto

Endpoint para manejar los mensajes del formulario de contacto.

## Endpoint

`POST /api/contact`

## Request Body

```json
{
  "name": "Nombre del usuario",
  "email": "email@ejemplo.com",
  "message": "Mensaje del usuario"
}
```

## Responses

### Success (200)
```json
{
  "success": true,
  "message": "Mensaje enviado correctamente"
}
```

### Error (400)
```json
{
  "error": "Todos los campos son requeridos"
}
```

### Error (500)
```json
{
  "error": "Error al enviar el mensaje",
  "details": "..."
}
```

## Configuración

### Variables de Entorno Requeridas

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=tu-email@gmail.com
SMTP_PASS=tu-app-password
CONTACT_EMAIL=email-donde-recibiras-mensajes@gmail.com
```

### Gmail App Password

Para usar Gmail como servidor SMTP:

1. Ve a tu cuenta de Google: https://myaccount.google.com/
2. Seguridad > Verificación en dos pasos (debe estar activada)
3. Contraseñas de aplicaciones
4. Genera una nueva contraseña para "Mail"
5. Usa esa contraseña en `SMTP_PASS`

### Modo Desarrollo

Si no configuras las variables SMTP, el endpoint funcionará en "modo desarrollo":
- No enviará emails reales
- Imprimirá los mensajes en la consola del servidor
- Responderá con éxito para permitir pruebas

## Características

- ✅ Validación de campos requeridos
- ✅ Validación de formato de email
- ✅ Envío de email al propietario del sitio
- ✅ Email de confirmación al usuario
- ✅ HTML templating en emails
- ✅ Modo desarrollo sin SMTP
- ✅ Manejo de errores completo

## Testing

### Con curl
```bash
curl -X POST http://localhost:3000/api/contact \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "message": "Este es un mensaje de prueba"
  }'
```

### Con el formulario web
1. Navega a http://localhost:3000
2. Ve a la sección de Contacto
3. Completa el formulario
4. El estado del envío se mostrará en la página
