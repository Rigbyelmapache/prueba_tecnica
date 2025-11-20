<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a {{ config('app.name') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f3f4f6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 20px;
            text-align: center;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #ffffff;
            font-size: 28px;
            margin: 0;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome-box {
            background-color: #f9fafb;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 30px 0;
            border-radius: 4px;
        }
        .info-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #4b5563;
            width: 140px;
        }
        .info-value {
            color: #1f2937;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 40px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 30px 0;
            box-shadow: 0 4px 6px rgba(102, 126, 234, 0.3);
        }
        .features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 30px 0;
        }
        .feature-box {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .feature-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .feature-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 5px;
        }
        .feature-desc {
            font-size: 14px;
            color: #6b7280;
        }
        .footer {
            background-color: #1f2937;
            color: #9ca3af;
            padding: 30px;
            text-align: center;
            font-size: 14px;
        }
        .footer a {
            color: #667eea;
            text-decoration: none;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #9ca3af;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('images/logo-white.png') }}" alt="Logo">
            <h1>¡Bienvenido a bordo! 🎉</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p style="font-size: 18px; color: #1f2937; margin-bottom: 20px;">
                Hola <strong>{{ $nombre }}</strong>,
            </p>

            <p style="font-size: 16px; color: #4b5563; line-height: 1.6;">
                Estamos encantados de que te hayas unido a <strong>{{ config('app.name') }}</strong>. 
                Tu cuenta ha sido creada exitosamente y ya puedes comenzar a explorar todas nuestras funcionalidades.
            </p>

            <!-- Welcome Box -->
            <div class="welcome-box">
                <h3 style="margin-top: 0; color: #667eea;">✨ Tu cuenta está lista</h3>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $email }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fecha de registro:</div>
                    <div class="info-value">{{ $fecha_registro }}</div>
                </div>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center;">
                <a href="{{ url('/dashboard') }}" class="cta-button">
                    Explorar mi cuenta →
                </a>
            </div>

            <!-- Features -->
            <h3 style="color: #1f2937; margin-top: 40px;">¿Qué puedes hacer ahora?</h3>
            <div class="features">
                <div class="feature-box">
                    <div class="feature-icon">👤</div>
                    <div class="feature-title">Completa tu perfil</div>
                    <div class="feature-desc">Añade tu información personal</div>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">🛍️</div>
                    <div class="feature-title">Explora productos</div>
                    <div class="feature-desc">Descubre nuestra oferta</div>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">⚙️</div>
                    <div class="feature-title">Configura preferencias</div>
                    <div class="feature-desc">Personaliza tu experiencia</div>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">💬</div>
                    <div class="feature-title">Contacta soporte</div>
                    <div class="feature-desc">Estamos aquí para ayudarte</div>
                </div>
            </div>

            <p style="font-size: 14px; color: #6b7280; margin-top: 30px; padding: 20px; background-color: #fef3c7; border-radius: 8px;">
                <strong>💡 Tip:</strong> No olvides verificar tu email para activar todas las funcionalidades de tu cuenta.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 10px 0;">
                Si tienes alguna pregunta, contáctanos en 
                <a href="mailto:soporte@tudominio.com">soporte@tudominio.com</a>
            </p>
            
            <div class="social-links">
                <a href="#">📘</a>
                <a href="#">📷</a>
                <a href="#">🐦</a>
                <a href="#">💼</a>
            </div>

            <p style="font-size: 12px; margin-top: 20px;">
                © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
            </p>
            
            <p style="font-size: 12px; margin-top: 10px;">
                <a href="{{ url('/') }}">Sitio web</a> | 
                <a href="{{ url('/terminos') }}">Términos</a> | 
                <a href="{{ url('/privacidad') }}">Privacidad</a>
            </p>
        </div>
    </div>
</body>
</html>