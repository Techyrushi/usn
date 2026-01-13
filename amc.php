<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
define('BASE_URL', $protocol . '://' . $host . $scriptDir . '/');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>USN Security | CCTV AMC Services</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Space+Grotesk:wght@500;700&display=swap"
    rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    :root {
      --primary: #0f172a;
      --secondary: #1e40af;
      --accent: #3b82f6;
      --light: #eef4ff;
      --white: #fff;
      --gray50: #f9fafb;
      --gray100: #f3f4f6;
      --gray200: #e5e7eb;
      --gray600: #4b5563;
      --gray700: #374151
    }

    body {
      font-family: "Inter", sans-serif;
      color: #111827;
      line-height: 1.6;
      background: var(--gray50)
    }

    h1,
    h2,
    h3 {
      font-family: "Space Grotesk", sans-serif
    }

    @keyframes up {
      from {
        opacity: 0;
        transform: translateY(30px)
      }

      to {
        opacity: 1;
        transform: none
      }
    }

    .btn {
      background: linear-gradient(135deg, var(--secondary), var(--accent));
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: .85rem 1.4rem;
      font-weight: 700;
      text-decoration: none;
      display: inline-block
    }

    .btn.secondary {
      background: #fff;
      color: var(--secondary);
      border: 1px solid var(--gray200)
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: rgba(255, 255, 255, .95);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(0, 0, 0, .05);
      transition: all .3s ease
    }

    .header.scrolled {
      box-shadow: 0 4px 30px rgba(0, 0, 0, .08)
    }

    .nav-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between
    }

    .logo {
      display: flex;
      align-items: center;
      gap: .75rem;
      font-size: 1.5rem;
      font-weight: 700;
      color: #0f172a;
      text-decoration: none;
      white-space: nowrap
    }

    .logo img {
      height: 50px;
      width: auto;
      object-fit: contain;
      transition: transform .3s ease
    }

    .nav-menu {
      display: flex;
      gap: 2.5rem;
      list-style: none;
      align-items: center
    }

    .nav-link {
      color: #374151;
      text-decoration: none;
      font-weight: 500;
      font-size: .95rem;
      position: relative;
      transition: color .3s ease
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background: #3b82f6;
      transition: width .3s ease-in-out
    }

    .nav-link:hover {
      color: #3b82f6
    }

    .nav-link:hover::after {
      width: 100%
    }

    .btn-primary {
      background: linear-gradient(135deg, #1e40af, #3b82f6);
      color: #fff;
      padding: .75rem 2rem;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: .95rem;
      transition: all .3s ease;
      box-shadow: 0 4px 15px rgba(62, 146, 204, .3);
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden
    }

    .btn-primary::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .3), transparent);
      transition: left .5s ease
    }

    .btn-primary:hover::before {
      left: 100%
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      cursor: pointer
    }

    .mobile-menu {
      display: none;
      position: fixed;
      top: 80px;
      left: 0;
      right: 0;
      background: white;
      box-shadow: 0 10px 40px rgba(0, 0, 0, .1);
      padding: 2rem;
      z-index: 999
    }

    .mobile-menu.active {
      display: block;
      animation: up .3s ease
    }

    .mobile-nav-menu {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 1.5rem
    }

    @media (max-width:768px) {
      .nav-menu {
        display: none
      }

      .mobile-menu-btn {
        display: block
      }
    }

    .hero {
      background-image: url("<?= BASE_URL ?>images/cctv_banner.png");
      background-size: cover;
      background-position: center;
      position: relative;
      padding-top: 80px
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, rgba(0, 0, 0, .35), rgba(0, 0, 0, .15));
      pointer-events: none
    }

    .hero-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 5.5rem 2rem 3rem;
      display: grid;
      grid-template-columns: 1.2fr .8fr;
      gap: 3rem;
      align-items: center
    }

    .hero h1 {
      font-size: 3rem;
      color: #fff;
      margin-bottom: .75rem
    }

    .hero p {
      color: rgba(255, 255, 255, .9);
      font-size: 1.1rem;
      margin-bottom: 1.25rem
    }

    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap
    }

    .hero-media {
      display: none
    }

    .kpis {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem 2rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.25rem
    }

    .kpi {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
      padding: 1rem 1.25rem
    }

    .kpi h3 {
      color: var(--primary);
      font-size: 1.8rem
    }

    .kpi p {
      color: var(--gray600)
    }

    .section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3.5rem 2rem
    }

    .section h2 {
      text-align: center;
      color: var(--primary);
      font-size: 2.4rem;
      margin-bottom: 2rem
    }

    .features {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem
    }

    .feature {
      background: #fff;
      border: 1px solid var(--gray100);
      border-radius: 18px;
      padding: 1.5rem;
      box-shadow: 0 12px 40px rgba(0, 0, 0, .06);
      display: flex;
      gap: 1rem;
      align-items: flex-start
    }

    .feature-icon {
      flex: 0 0 52px;
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: linear-gradient(135deg, var(--light), #fff);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--secondary);
      box-shadow: inset 0 0 0 1px rgba(30, 64, 175, .15), 0 6px 16px rgba(0, 0, 0, .06)
    }

    .feature-content {
      display: flex;
      flex-direction: column;
      gap: .35rem
    }

    .feature h3 {
      color: var(--primary);
      margin: .5rem 0
    }

    .feature p {
      color: var(--gray700)
    }

    .split {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem
    }

    .panel {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, .06);
      padding: 1.75rem;
      border: 1px solid var(--gray100);
      display: flex;
      flex-direction: column;
      min-height: 360px
    }
    .panel.center{
      align-items: center;
      text-align: center
    }
    .panel.center .check-list{
      max-width: 560px;
      margin-left: auto;
      margin-right: auto;
      text-align: left
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: .5rem;
      margin-bottom: 1rem
    }

    .form-group input,
    .form-group textarea {
      padding: 1rem 1.1rem;
      border: 2px solid var(--gray200);
      border-radius: 12px;
      font-size: 1rem
    }

    .check-list {
      margin-top: 1rem;
      display: grid;
      gap: .75rem;
      color: var(--gray700);
      padding-left: 0;
      list-style: none
    }

    .check-list li {
      display: flex;
      align-items: flex-start;
      gap: .6rem
    }

    .check-icon {
      flex: 0 0 24px;
      width: 24px;
      height: 24px;
      border-radius: 8px;
      background: linear-gradient(135deg, var(--light), #fff);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--secondary);
      box-shadow: inset 0 0 0 1px rgba(30, 64, 175, .15);
      margin-top: 2px
    }

    .quote-band {
      background: #fff
    }

    .quote-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: stretch
    }

    .quote-form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem
    }

    .quote-form .span-2 {
      grid-column: 1 / -1
    }

    .quote-form input {
      padding: 1rem 1.1rem;
      border: 2px solid var(--gray200);
      border-radius: 12px
    }

    .footer {
      background: #020617;
      color: #fff
    }

    .footer-container {
      max-width: 1400px;
      margin: 0 auto
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 4rem;
      margin-bottom: 3rem;
      padding: 4rem 2rem 0
    }

    .footer-brand {
      display: flex;
      align-items: center;
      gap: .75rem;
      margin-bottom: 1.5rem
    }

    .footer-description {
      color: rgba(255, 255, 255, .7);
      line-height: 1.7;
      margin-bottom: 1.5rem
    }

    .footer-title {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1.5rem
    }

    .footer-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 1rem
    }

    .footer-links a {
      color: rgba(255, 255, 255, .7);
      text-decoration: none;
      transition: color .3s ease
    }

    .footer-links a:hover {
      color: #3b82f6
    }

    .social-links {
      display: flex;
      gap: 1rem
    }

    .social-link {
      width: 45px;
      height: 45px;
      background: rgba(255, 255, 255, .1);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all .3s ease;
      text-decoration: none;
      color: #fff
    }

    .social-link:hover {
      background: #3b82f6;
      transform: translateY(-3px)
    }

    .footer-bottom {
      border-top: 1px solid rgba(255, 255, 255, .1);
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      color: rgba(255, 255, 255, .6)
    }

    .footer-bottom-links {
      display: flex;
      gap: 2rem
    }

    .footer-bottom-links a {
      color: rgba(255, 255, 255, .6);
      text-decoration: none;
      transition: color .3s ease
    }

    .footer-bottom-links a:hover {
      color: #fff
    }

    @media (max-width:1024px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 3rem
      }
    }

    @media (max-width:768px) {
      .footer-grid {
        grid-template-columns: 1fr
      }

      .footer-bottom {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center
      }
    }

    .whatsapp-float {
      position: fixed;
      right: 24px;
      bottom: 24px;
      width: 64px;
      height: 64px;
      border-radius: 50%;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      -webkit-tap-highlight-color: transparent
    }

    .whatsapp-inner {
      position: relative;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: #ecf4ef;
      box-shadow: 0 12px 25px rgba(0, 0, 0, .25), 0 4px 12px rgba(0, 0, 0, .2);
      display: flex;
      align-items: center;
      justify-content: center;
      transform: translateY(0);
      transition: transform .2s ease, box-shadow .2s ease, background .2s ease
    }

    .whatsapp-inner img {
      width: 34px;
      height: 34px
    }

    .whatsapp-ripple {
      position: absolute;
      inset: 0;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(37, 211, 102, .25), transparent 60%);
      animation: whatsapp-pulse 2.2s ease-out infinite;
      pointer-events: none
    }

    .whatsapp-float:hover .whatsapp-inner {
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 16px 32px rgba(0, 0, 0, .28), 0 6px 16px rgba(0, 0, 0, .22);
      background: #1ebe5b
    }

    .whatsapp-float:active .whatsapp-inner {
      transform: translateY(0) scale(.97);
      box-shadow: 0 6px 18px rgba(0, 0, 0, .26), 0 2px 8px rgba(0, 0, 0, .2)
    }

    @keyframes whatsapp-pulse {
      0% {
        transform: scale(.9);
        opacity: .7
      }

      70% {
        transform: scale(1.25);
        opacity: 0
      }

      100% {
        transform: scale(1.25);
        opacity: 0
      }
    }

    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: transform .6s ease, opacity .6s ease
    }

    .reveal.show {
      opacity: 1;
      transform: none
    }

    @media(max-width:1024px) {
      .hero-inner {
        grid-template-columns: 1fr
      }

      .features {
        grid-template-columns: 1fr
      }

      .split {
        grid-template-columns: 1fr
      }

      .kpis {
        grid-template-columns: 1fr 1fr
      }

      .quote-inner {
        grid-template-columns: 1fr
      }

      .quote-form {
        grid-template-columns: 1fr
      }
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: .5rem;
      padding: .8rem 1.25rem;
      min-height: 44px;
      line-height: 1;
      border-radius: 999px;
      font-weight: 700;
      text-decoration: none;
      border: 1px solid transparent;
      white-space: nowrap;
      letter-spacing: .01em;
      transition: transform .25s ease, box-shadow .25s ease, background .25s ease, color .25s ease, border-color .25s ease;
      box-shadow: 0 6px 18px rgba(62, 146, 204, .22);
      cursor: pointer
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(62, 146, 204, .28)
    }

    .btn:active {
      transform: translateY(0) scale(.98)
    }

    .btn:focus-visible {
      outline: none;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .2), 0 12px 28px rgba(62, 146, 204, .28)
    }

    .btn-primary {
      background: linear-gradient(135deg, #1e40af, #3b82f6);
      color: #fff;
      border: none;
      border-radius: 50px;
      position: relative;
      overflow: hidden
    }

    .btn-primary::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .3), transparent);
      transition: left .5s ease
    }

    .btn-primary:hover::before {
      left: 100%
    }

    .btn-secondary {
      background: #fff;
      color: var(--secondary);
      border: 2px solid var(--gray200);
      box-shadow: 0 6px 18px rgba(0, 0, 0, .06)
    }

    .btn-secondary:hover {
      border-color: var(--accent);
      box-shadow: 0 12px 28px rgba(0, 0, 0, .1)
    }

    .btn-whatsapp {
      background: linear-gradient(135deg, #1ebe5b, #25D366);
      color: #fff;
      box-shadow: 0 12px 30px rgba(37, 211, 102, .25)
    }

    .btn-whatsapp:hover {
      box-shadow: 0 18px 36px rgba(37, 211, 102, .32)
    }

    .hero {
      padding-bottom: 7rem
    }

    .hero-inner {
      grid-template-columns: 1fr;
      gap: 2rem;
      justify-items: center;
      text-align: center
    }

    .hero-content {
      background: rgba(255, 255, 255, .06);
      border: 1px solid rgba(255, 255, 255, .15);
      border-radius: 20px;
      padding: 1.75rem;
      backdrop-filter: blur(8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, .18)
    }

    .hero-kicker {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      padding: .35rem .75rem;
      border-radius: 999px;
      background: rgba(255, 255, 255, .12);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, .25);
      font-weight: 700;
      letter-spacing: .02em;
      margin-bottom: .75rem;
      font-size: .85rem
    }

    .hero-actions {
      justify-content: center
    }

    .kpis {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -56px;
      z-index: 5;
      width: min(1200px, calc(100% - 32px));
      padding: 0 1rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem
    }

    .kpi {
      position: relative;
      background: linear-gradient(135deg, #ffffff, #f8fbff);
      border: 1px solid var(--gray100);
      border-radius: 18px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, .08);
      padding: 1.1rem 1.25rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: .5rem;
      transition: transform .3s ease, box-shadow .3s ease;
      animation: up .6s ease both
    }

    .kpi-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--light), #fff);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--secondary);
      box-shadow: inset 0 0 0 1px rgba(30, 64, 175, .15), 0 6px 16px rgba(0, 0, 0, .06);
      margin-top: 6px
    }

    .kpi::before {
      content: "";
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 48px;
      height: 4px;
      border-radius: 0 0 4px 4px;
      background: linear-gradient(90deg, var(--secondary), var(--accent));
      opacity: .9
    }

    .kpi:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, .12)
    }

    .kpi h3 {
      font-size: 1.85rem;
      line-height: 1
    }

    .kpi p {
      color: var(--gray600);
      font-weight: 600;
      letter-spacing: .02em
    }

    .section-after-hero {
      margin-top: 6.5rem
    }

    .section.alt {
      position: relative;
      background: radial-gradient(1200px 50% at 50% 0%, rgba(59, 130, 246, .06), transparent), linear-gradient(180deg, #ffffff 0%, #f7faff 100%);
      overflow: hidden;
      border-top: 1px solid var(--gray100);
      border-bottom: 1px solid var(--gray100)
    }

    .section.alt::before {
      content: "";
      position: absolute;
      inset: -50% -10% -40% -10%;
      background: radial-gradient(circle at 25% 25%, rgba(30, 64, 175, .07), transparent 40%), radial-gradient(circle at 75% 30%, rgba(59, 130, 246, .06), transparent 45%), radial-gradient(circle at 50% 80%, rgba(59, 130, 246, .05), transparent 40%);
      filter: blur(18px);
      animation: bandGlow 18s ease-in-out infinite alternate;
      pointer-events: none
    }

    .quote-img {
      width: 100%;
      height: auto;
      max-height: 360px;
      border-radius: 12px;
      object-fit: contain;
      display: block;
      box-shadow: 0 10px 28px rgba(0, 0, 0, .08);
      background: linear-gradient(135deg, #f8fbff, #eef4ff)
    }

    .feature {
      transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease
    }

    .feature:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, .1);
      border-color: #e1e8ff
    }

    .panel {
      transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease
    }

    .panel:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, .1);
      border-color: #e1e8ff
    }

    .form-group label {
      font-weight: 600;
      color: var(--primary)
    }

    .form-group input,
    .form-group textarea {
      transition: all .3s ease
    }

    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .1)
    }

    .quote-band {
      position: relative;
      background: radial-gradient(1200px 50% at 50% 0%, rgba(59, 130, 246, .08), transparent), linear-gradient(180deg, #ffffff 0%, #f7faff 100%);
      overflow: hidden
    }

    .quote-band::before {
      content: "";
      position: absolute;
      inset: -50% -10% -40% -10%;
      background: radial-gradient(circle at 30% 20%, rgba(30, 64, 175, .08), transparent 40%), radial-gradient(circle at 70% 30%, rgba(59, 130, 246, .07), transparent 45%), radial-gradient(circle at 50% 80%, rgba(59, 130, 246, .06), transparent 40%);
      filter: blur(20px);
      animation: bandGlow 16s ease-in-out infinite alternate;
      pointer-events: none
    }

    @keyframes bandGlow {
      0% {
        transform: translateY(0)
      }

      100% {
        transform: translateY(-20px)
      }
    }

    .quote-inner {
      padding: 3.25rem 2rem
    }

    .quote-form input:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .1)
    }

    @media (max-width:1024px) {
      .kpis {
        grid-template-columns: 1fr 1fr;
        bottom: -64px;
        width: min(100%, calc(100% - 24px))
      }
    }

    @media (max-width:768px) {
      .kpis {
        grid-template-columns: 1fr;
        bottom: -72px;
        gap: .75rem
      }

      .hero {
        padding-bottom: 8.5rem
      }

      .form-row {
        grid-template-columns: 1fr
      }
    }
  </style>
</head>

<body>
  <a href="https://wa.me/911234567890" class="whatsapp-float" target="_blank" rel="noopener noreferrer"
    aria-label="Chat with us on WhatsApp">
    <span class="whatsapp-ripple"></span>
    <span class="whatsapp-inner"><img src="<?= BASE_URL ?>img/whatsapp.png" alt="WhatsApp" /></span>
  </a>
  <header class="header" id="header">
    <nav class="nav-container">
      <a href="<?= BASE_URL ?>index" class="logo"><img src="<?= BASE_URL ?>images/USN_Logo.png" alt="USN" /></a>
      <ul class="nav-menu">
        <li><a href="<?= BASE_URL ?>index" class="nav-link">Home</a></li>
        <li><a href="<?= BASE_URL ?>services" class="nav-link">Services</a></li>
        <li><a href="<?= BASE_URL ?>index#about" class="nav-link">About Us</a></li>
        <li><a href="<?= BASE_URL ?>index#contact" class="nav-link">Contact Us</a></li>
        <li><a href="<?= BASE_URL ?>amc" class="btn-primary">Get AMC Quote</a></li>
      </ul>
      <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
        <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav>
    <div class="mobile-menu" id="mobileMenu">
      <ul class="mobile-nav-menu">
        <li><a href="<?= BASE_URL ?>index" class="nav-link">Home</a></li>
        <li><a href="<?= BASE_URL ?>services" class="nav-link">Services</a></li>
        <li><a href="<?= BASE_URL ?>index#contact" class="nav-link">Contact Us</a></li>
        <li><a href="<?= BASE_URL ?>amc" class="btn-primary" style="display:inline-block; text-align:center">Get AMC
            Quote</a></li>
      </ul>
    </div>
  </header>
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-content">
        <div class="hero-kicker">AMC Service Plans</div>
        <h1 style="animation:up .8s ease forwards">CCTV AMC Services You Can Depend On</h1>
        <p style="animation:up .8s ease .1s forwards">Keep your security system running smoothly with preventive
          maintenance and emergency support.</p>
        <div class="hero-actions" style="animation:up .8s ease .2s forwards">
          <a class="btn btn-primary" href="#quote">Get Free AMC Quote</a>
          <a class="btn btn-whatsapp" href="https://wa.me/911234567890" target="_blank">WhatsApp Us</a>
        </div>
      </div>
      <div class="hero-media" style="animation:up .8s ease .2s forwards">
        <img src="<?= BASE_URL ?>images/cctv_banner.png" alt="AMC Hero" />
      </div>
    </div>
    <div class="kpis">
      <div class="kpi" style="animation:up .6s ease .1s forwards">
        <div class="kpi-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2M12 22a10 10 0 100-20 10 10 0 000 20z" />
          </svg>
        </div>
        <h3>₹700/month</h3>
        <p>AMC starting from ₹700 per month</p>
      </div>
      <div class="kpi" style="animation:up .6s ease .2s forwards">
        <div class="kpi-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M6 3h12v8a6 6 0 11-12 0V3z" />
          </svg>
        </div>
        <h3>1000+</h3>
        <p>Cameras Maintained</p>
      </div>
      <div class="kpi" style="animation:up .6s ease .3s forwards">
        <div class="kpi-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3v18" />
          </svg>
        </div>
        <h3>98%</h3>
        <p>Uptime Promise</p>
      </div>
    </div>
  </section>
  <section class="section section-after-hero">
    <h2 style="animation:up .8s ease forwards">What's Included in Our AMC?</h2>
    <div class="features">
      <div class="feature reveal" style="animation:up .8s ease .1s forwards">
        <div class="feature-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M7 8h10M7 12h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
          </svg>
        </div>
        <div class="feature-content">
          <h3>Preventive Maintenance</h3>
          <p>Regular checkups, cleaning, and calibration to avoid downtime.</p>
        </div>
      </div>
      <div class="feature reveal" style="animation:up .8s ease .2s forwards">
        <div class="feature-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7l10 10M7 17L17 7M2 12h3m14 0h3" />
          </svg>
        </div>
        <div class="feature-content">
          <h3>Rapid Repairs</h3>
          <p>Priority repair service for major and minor faults.</p>
        </div>
      </div>
      <div class="feature reveal" style="animation:up .8s ease .3s forwards">
        <div class="feature-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2M12 22a10 10 0 100-20 10 10 0 000 20z" />
          </svg>
        </div>
        <div class="feature-content">
          <h3>24/7 Emergency Support</h3>
          <p>Round-the-clock support when you need it most.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="section alt">
    <div class="split">
      <div class="panel reveal center" style="animation:up .8s ease forwards">
        <h2>Why Choose Us for Your AMC?</h2>
        <ul class="check-list">
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>Experienced, certified technicians</span></li>
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>SLA-driven fast response</span></li>
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>Transparent, flexible pricing</span></li>
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>Genuine parts and accessories</span></li>
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>Proactive preventive maintenance</span></li>
        </ul>
      </div>
      <div class="panel reveal" id="quote" style="animation:up .8s ease .1s forwards">
        <h2>Request Quote</h2>
        <form>
          <div class="form-row">
            <div class="form-group"><label for="name">Your Name</label><input id="name" type="text" placeholder="Enter your name" required /></div>
            <div class="form-group"><label for="email">Email</label><input id="email" type="email" placeholder="Enter your email" required /></div>
          </div>
          <div class="form-group"><label for="phone">Phone Number</label><input id="phone" type="tel" placeholder="Enter your phone number" required /></div>
          <div class="form-group"><label for="message">Your Message</label><textarea id="message" rows="4" placeholder="Tell us about your AMC needs..."></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Request Quote</button>
        </form>
      </div>
    </div>
  </section>
  <section class="quote-band">
    <div class="quote-inner">
      <div class="panel reveal">
        <h2>Get a Free AMC Quote Today</h2>
        <p style="color:var(--gray700)">Receive a personalized AMC plan for your society or business.</p>
        <ul class="check-list" style="margin-bottom:1rem">
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>Same-day callback</span></li>
          <li><span class="check-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg></span><span>No-obligation estimate</span></li>
        </ul>
        <form class="quote-form" style="margin-top:.25rem">
          <input type="text" placeholder="Your Name" required />
          <input type="email" placeholder="Email" required />
          <input class="span-2" type="tel" placeholder="Phone Number" required />
          <button class="btn btn-primary span-2" type="submit" style="justify-self:end">Request Quote</button>
        </form>
      </div>
      <div class="panel reveal">
        <img src="<?= BASE_URL ?>img/headerimg.jpeg" alt="AMC Image" class="quote-img" />
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-grid">
        <div>
          <div class="footer-brand">
            <img src="<?= BASE_URL ?>images/USN_Logo.jpg" width="100" height="auto" alt="USN Security" />
          </div>
          <p class="footer-description">Professional security solutions for homes and businesses. Protecting what
            matters most with cutting-edge technology and expert service.</p>
          <div class="social-links">
            <a href="#" class="social-link" aria-label="Facebook"><svg width="20" height="20" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                </path>
              </svg></a>
            <a href="#" class="social-link" aria-label="Twitter"><svg width="20" height="20" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                  d="M23 4.999c-.8.4-1.6.7-2.5.8.9-.5 1.6-1.4 1.9-2.4-.9.5-1.8.9-2.8 1.1C18.9 3.6 17.8 3 16.5 3c-2.4 0-4.3 1.9-4.3 4.3 0 .3 0 .6.1.9-3.6-.2-6.7-1.9-8.8-4.5-.4.6-.6 1.4-.6 2.1 0 1.5.8 2.8 2.1 3.6-.7 0-1.3-.2-1.9-.5v.1c0 2.1 1.5 3.8 3.4 4.2-.4.1-.8.2-1.2.2-.3 0-.6 0-.8-.1.6 1.8 2.3 3.2 4.3 3.2-1.6 1.2-3.6 1.9-5.7 1.9-.4 0-.7 0-1.1-.1 2 1.3 4.4 2 6.9 2 8.2 0 12.7-6.8 12.7-12.7v-.6c.8-.5 1.5-1.3 2-2.1z">
                </path>
              </svg></a>
          </div>
        </div>
        <div>
          <h4 class="footer-title">Quick Links</h4>
          <ul class="footer-links">
            <li><a href="<?= BASE_URL ?>index">Home</a></li>
            <li><a href="<?= BASE_URL ?>services">Services</a></li>
            <li><a href="<?= BASE_URL ?>index#about">About Us</a></li>
            <li><a href="<?= BASE_URL ?>index#contact">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4 class="footer-title">Services</h4>
          <ul class="footer-links">
            <li><a href="<?= BASE_URL ?>services">CCTV Systems</a></li>
            <li><a href="<?= BASE_URL ?>services">Access Control</a></li>
            <li><a href="<?= BASE_URL ?>services">Alarm Systems</a></li>
            <li><a href="<?= BASE_URL ?>services">Intercom Solutions</a></li>
          </ul>
        </div>
        <div>
          <h4 class="footer-title">Contact Info</h4>
          <ul class="footer-links">
            <li><a href="tel:+911234567890">+91 123-456-7890</a></li>
            <li><a href="mailto:info@usnsecurity.com">info@usnsecurity.com</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p class="text-center">&copy; 2026 USN Security. All rights reserved.</p>
        <!-- <div class="footer-bottom-links"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></div> -->
      </div>
    </div>
  </footer>
  <script>
    document.querySelectorAll('[style*="animation:up"]').forEach(el => { el.style.opacity = '1'; });
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    mobileMenuBtn.addEventListener("click", () => { mobileMenu.classList.toggle("active"); });
    const header = document.getElementById("header");
    window.addEventListener("scroll", () => { if (window.scrollY > 50) { header.classList.add("scrolled"); } else { header.classList.remove("scrolled"); } });
    const observer = new IntersectionObserver((entries) => { entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); } }); }, { threshold: .15 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
  </script>
</body>

</html>
