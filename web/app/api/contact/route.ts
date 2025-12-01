import { NextRequest, NextResponse } from 'next/server';
import nodemailer from 'nodemailer';

export async function POST(request: NextRequest) {
  try {
    const body = await request.json();
    const { name, email, message } = body;

    // Validación básica
    if (!name || !email || !message) {
      return NextResponse.json(
        { error: 'Todos los campos son requeridos' },
        { status: 400 }
      );
    }

    // Validar formato de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return NextResponse.json(
        { error: 'Email inválido' },
        { status: 400 }
      );
    }

    // Configurar transporter de nodemailer
    const transporter = nodemailer.createTransport({
      host: process.env.SMTP_HOST || 'smtp.gmail.com',
      port: parseInt(process.env.SMTP_PORT || '587'),
      secure: false, // true para 465, false para otros puertos
      auth: {
        user: process.env.SMTP_USER,
        pass: process.env.SMTP_PASS,
      },
    });

    // Verificar configuración de SMTP
    if (!process.env.SMTP_USER || !process.env.SMTP_PASS) {
      console.warn('⚠️  SMTP no configurado. Mostrando mensaje en consola.');
      console.log('📧 Nuevo mensaje de contacto:');
      console.log(`   Nombre: ${name}`);
      console.log(`   Email: ${email}`);
      console.log(`   Mensaje: ${message}`);
      
      return NextResponse.json(
        { 
          success: true, 
          message: 'Mensaje recibido (modo desarrollo - revisa la consola)' 
        },
        { status: 200 }
      );
    }

    // Enviar email
    await transporter.sendMail({
      from: `"Contacto CCruces" <${process.env.SMTP_USER}>`,
      to: process.env.CONTACT_EMAIL || process.env.SMTP_USER,
      subject: `Nuevo mensaje de contacto - ${name}`,
      text: `
Nombre: ${name}
Email: ${email}

Mensaje:
${message}
      `,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #4F46E5;">Nuevo mensaje de contacto</h2>
          <div style="background: #f3f4f6; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <p><strong>Nombre:</strong> ${name}</p>
            <p><strong>Email:</strong> <a href="mailto:${email}">${email}</a></p>
          </div>
          <div style="background: white; padding: 20px; border-left: 4px solid #4F46E5;">
            <p><strong>Mensaje:</strong></p>
            <p style="white-space: pre-wrap;">${message}</p>
          </div>
          <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">
          <p style="color: #6b7280; font-size: 12px;">
            Este mensaje fue enviado desde el formulario de contacto de CCruces.
          </p>
        </div>
      `,
    });

    // También enviar confirmación al usuario
    await transporter.sendMail({
      from: `"CCruces" <${process.env.SMTP_USER}>`,
      to: email,
      subject: 'Hemos recibido tu mensaje',
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #4F46E5;">¡Gracias por contactarnos!</h2>
          <p>Hola ${name},</p>
          <p>Hemos recibido tu mensaje y te responderemos lo antes posible.</p>
          <div style="background: #f3f4f6; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <p><strong>Tu mensaje:</strong></p>
            <p style="white-space: pre-wrap;">${message}</p>
          </div>
          <p>Saludos,<br><strong>El equipo de CCruces</strong></p>
        </div>
      `,
    });

    return NextResponse.json(
      { success: true, message: 'Mensaje enviado correctamente' },
      { status: 200 }
    );

  } catch (error: any) {
    console.error('Error al enviar mensaje:', error);
    return NextResponse.json(
      { 
        error: 'Error al enviar el mensaje',
        details: error.message 
      },
      { status: 500 }
    );
  }
}
