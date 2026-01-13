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
  <title>USN Security | Services</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Space+Grotesk:wght@500;700&display=swap"
    rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary-blue: #0f172a;
      --secondary-blue: #1e40af;
      --accent-blue: #3b82f6;
      --light-blue: #dbeafe;
      --dark-navy: #020617;
      --white: #ffffff;
      --gray-50: #f9fafb;
      --gray-100: #f3f4f6;
      --gray-200: #e5e7eb;
      --gray-600: #4b5563;
      --gray-700: #374151;
      --gray-900: #111827;
    }

    body {
      font-family: "Inter", sans-serif;
      color: var(--gray-900);
      line-height: 1.6;
      background: var(--gray-50);
    }

    h1,
    h2,
    h3,
    h4 {
      font-family: "Space Grotesk", sans-serif;
      line-height: 1.2;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateX(40px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    .animate {
      opacity: 0;
    }

    .animate.fade {
      animation: fadeInUp .8s ease forwards;
    }

    .animate.slide {
      animation: slideIn .8s ease forwards;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      transition: all .3s ease;
    }

    .header.scrolled {
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
    }

    .nav-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: .75rem;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary-blue);
      text-decoration: none;
      white-space: nowrap;
    }

    .logo img {
      height: 50px;
      width: auto;
      object-fit: contain;
      transition: transform .3s ease;
    }

    .nav-menu {
      display: flex;
      gap: 2.5rem;
      list-style: none;
      align-items: center;
    }

    .nav-link {
      color: var(--gray-700);
      text-decoration: none;
      font-weight: 500;
      font-size: .95rem;
      position: relative;
      transition: color .3s ease;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background: var(--accent-blue);
      transition: width .3s ease-in-out;
    }

    .nav-link:hover {
      color: var(--accent-blue);
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: .5rem;
      padding: .8rem 1.25rem;
      border-radius: 999px;
      line-height: 1;
      font-weight: 700;
      text-decoration: none;
      transition: transform .25s ease, box-shadow .25s ease, background .25s ease, color .25s ease, border-color .25s ease;
      box-shadow: 0 6px 18px rgba(62, 146, 204, .22);
      border: 1px solid transparent;
      cursor: pointer;
      white-space: nowrap;
      min-height: 44px;
      letter-spacing: .01em;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(62, 146, 204, .28);
    }

    .btn:active {
      transform: translateY(0) scale(.98);
    }

    .btn:focus-visible {
      outline: none;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .2), 0 12px 28px rgba(62, 146, 204, .28);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--secondary-blue), var(--accent-blue));
      color: #fff;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: .95rem;
      transition: all .3s ease;
      box-shadow: 0 4px 15px rgba(62, 146, 204, .3);
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .btn.btn-primary {
      padding: .8rem 1.25rem;
    }

    .btn-primary::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .3), transparent);
      transition: left .5s ease;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-secondary {
      background: #fff;
      color: var(--secondary-blue);
      border: 2px solid var(--gray-200);
      box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
    }

    .btn.btn-secondary {
      padding: .8rem 1.25rem;
    }

    .btn-secondary:hover {
      border-color: var(--accent-blue);
      box-shadow: 0 12px 28px rgba(0, 0, 0, .1);
    }

    .btn-ghost {
      background: rgba(255, 255, 255, .08);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, .3);
      box-shadow: 0 8px 22px rgba(0, 0, 0, .25);
    }

    .btn-ghost:hover {
      background: rgba(255, 255, 255, .12);
    }

    .btn-whatsapp {
      background: linear-gradient(135deg, #1ebe5b, #25D366);
      color: #fff;
      box-shadow: 0 12px 30px rgba(37, 211, 102, .25);
    }

    .btn.btn-whatsapp {
      padding: .8rem 1.25rem;
    }

    .btn-whatsapp:hover {
      box-shadow: 0 18px 36px rgba(37, 211, 102, .32);
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
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
      z-index: 999;
    }

    .mobile-menu.active {
      display: block;
      animation: fadeInUp .3s ease;
    }

    .mobile-nav-menu {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    @media (max-width:768px) {
      .nav-menu {
        display: none;
      }

      .mobile-menu-btn {
        display: block;
      }
    }

    @media (max-width:768px) {
      .logo img {
        height: 36px;
      }
    }

    .hero {
      position: relative;
      min-height: 60vh;
      display: flex;
      align-items: center;
      background-image: url("<?= BASE_URL ?>images/cctv_banner.png");
      background-size: cover;
      background-position: center;
      padding-top: 80px;
      padding-bottom: 7rem;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, rgba(0, 0, 0, .35), rgba(0, 0, 0, .15));
      pointer-events: none;
    }

    .hero-wrap {
      max-width: 1200px;
      margin: 0 auto;
      padding: 6rem 2rem 4rem;
      display: grid;
      grid-template-columns: 1fr;
      gap: 2rem;
      align-items: center;
      justify-items: center;
      text-align: center;
    }

    .hero-content {
      background: rgba(255, 255, 255, .06);
      border: 1px solid rgba(255, 255, 255, .15);
      border-radius: 20px;
      padding: 1.75rem;
      backdrop-filter: blur(8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, .18);
      text-align: center;
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
      font-size: .85rem;
    }

    .hero h1 {
      font-size: 3rem;
      color: #fff;
      margin-bottom: 1rem;
    }

    .hero p {
      color: rgba(255, 255, 255, .9);
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }

    .hero-cta {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      justify-content: center;
    }

    .hero-media {
      display: none;
    }

    .stats {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -56px;
      z-index: 5;
      width: min(1200px, calc(100% - 32px));
      padding: 0 1rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }

    .stat {
      position: relative;
      background: linear-gradient(135deg, #ffffff, #f8fbff);
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, .08);
      padding: 1.1rem 1.25rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: .65rem;
      transition: transform .3s ease, box-shadow .3s ease;
      animation: fadeInUp .6s ease both;
    }

    .stat::before {
      content: "";
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 48px;
      height: 4px;
      border-radius: 0 0 4px 4px;
      background: linear-gradient(90deg, var(--secondary-blue), var(--accent-blue));
      opacity: .9;
    }

    .stats .stat:nth-child(1) {
      animation-delay: .1s;
    }

    .stats .stat:nth-child(2) {
      animation-delay: .2s;
    }

    .stats .stat:nth-child(3) {
      animation-delay: .3s;
    }

    .stat:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, .12);
    }

    .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--light-blue), #eef4ff);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--secondary-blue);
      box-shadow: inset 0 0 0 1px rgba(30, 64, 175, .15), 0 6px 16px rgba(0, 0, 0, .08);
      margin-top: 6px;
    }

    .stat h3 {
      font-size: 1.85rem;
      color: var(--primary-blue);
      line-height: 1;
    }

    .stat p {
      color: var(--gray-600);
      font-weight: 600;
      letter-spacing: .02em;
    }

    .featured {
      background: linear-gradient(180deg, #f9fbff 0%, #eef4ff 100%);
      border-top: 1px solid var(--gray-100);
      border-bottom: 1px solid var(--gray-100);
      margin-top: 6rem;
    }

    .featured-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 4rem 2rem;
    }

    .featured-header {
      text-align: center;
      margin-bottom: 2.2rem;
    }

    .featured-kicker {
      display: inline-block;
      background: linear-gradient(135deg, var(--light-blue), #eef4ff);
      color: var(--secondary-blue);
      border: 1px solid var(--gray-200);
      border-radius: 999px;
      padding: .35rem .8rem;
      font-weight: 700;
      letter-spacing: .02em;
      margin-bottom: .75rem;
    }

    .featured-header h2 {
      font-size: 2.4rem;
      color: var(--primary-blue);
    }

    .featured-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 2rem;
    }

    .featured-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 14px 44px rgba(0, 0, 0, .1);
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      transition: transform .35s ease, box-shadow .35s ease;
      border: 1px solid var(--gray-100);
      position: relative;
    }

    .featured-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 22px 58px rgba(0, 0, 0, .14);
    }

    .feature-media {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .feature-body {
      padding: 1.9rem;
      display: flex;
      flex-direction: column;
      gap: .75rem;
    }

    .feature-title {
      color: var(--primary-blue);
      font-size: 1.35rem;
    }

    .feature-desc {
      color: var(--gray-700);
    }

    .feature-actions {
      margin-top: auto;
      display: flex;
      gap: .75rem;
    }

    .feature-tag {
      position: absolute;
      top: 14px;
      left: 14px;
      background: linear-gradient(135deg, var(--secondary-blue), var(--accent-blue));
      color: #fff;
      font-weight: 700;
      border-radius: 999px;
      padding: .4rem .7rem;
      font-size: .8rem;
      box-shadow: 0 8px 22px rgba(62, 146, 204, .25);
    }

    .catalog {
      background: #fff;
    }

    .catalog-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 4rem 2rem;
    }

    .catalog-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .catalog-header h2 {
      font-size: 2.2rem;
      color: var(--primary-blue);
    }

    .catalog-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
    }

    .service-card {
      background: #fff;
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
      display: flex;
      flex-direction: column;
      transition: transform .3s ease, box-shadow .3s ease;
    }

    .service-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, .1);
    }

    .service-thumb {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
    }

    .service-body {
      padding: 1.25rem;
      display: flex;
      flex-direction: column;
      gap: .5rem;
    }

    .service-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--primary-blue);
    }

    .service-desc {
      font-size: .95rem;
      color: var(--gray-700);
    }

    .service-actions {
      margin-top: .75rem;
    }

    .btn-quote {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: .5rem;
      padding: .8rem 1.25rem;
      border-radius: 999px;
      font-weight: 700;
      text-decoration: none;
      background: linear-gradient(135deg, var(--secondary-blue), var(--accent-blue));
      color: #fff;
      box-shadow: 0 6px 18px rgba(62, 146, 204, .25);
      transition: transform .25s ease, box-shadow .25s ease;
      letter-spacing: .02em;
      min-height: 44px;
      white-space: nowrap;
    }

    .btn-quote:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 12px 28px rgba(62, 146, 204, .32);
    }

    .btn-quote:focus-visible {
      outline: none;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .2), 0 12px 28px rgba(62, 146, 204, .32);
    }

    @media (max-width:1024px) {
      .catalog-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width:768px) {
      .catalog-grid {
        grid-template-columns: 1fr;
      }
    }

    .quote-modal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .5);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 2000;
      padding: 1rem;
    }

    .quote-modal.active {
      display: flex;
    }

    .quote-box {
      width: 100%;
      max-width: 560px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
      overflow: hidden;
    }

    .quote-head {
      padding: 1.25rem 1.5rem;
      background: linear-gradient(135deg, var(--secondary-blue), var(--accent-blue));
      color: #fff;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .quote-close {
      background: transparent;
      border: none;
      color: #fff;
      font-size: 1.25rem;
      cursor: pointer;
    }

    .quote-body {
      padding: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      color: var(--primary-blue);
      margin-bottom: .5rem;
      font-size: .95rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 1rem 1.1rem;
      border: 2px solid var(--gray-200);
      border-radius: 12px;
      font-size: 1rem;
      transition: all .3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--accent-blue);
      box-shadow: 0 0 0 4px rgba(62, 146, 204, .1);
    }

    .form-actions {
      display: flex;
      gap: .75rem;
      justify-content: flex-end;
    }

    .btn-cancel {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      color: var(--secondary-blue);
      border: 1px solid var(--gray-200);
      border-radius: 999px;
      padding: .8rem 1.25rem;
      font-weight: 700;
      min-height: 44px;
    }

    .btn-cancel:hover {
      border-color: var(--accent-blue);
    }

    .btn-submit {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--secondary-blue), var(--accent-blue));
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: .8rem 1.25rem;
      font-weight: 700;
      box-shadow: 0 6px 18px rgba(62, 146, 204, .25);
      transition: transform .25s ease, box-shadow .25s ease;
      min-height: 44px;
      white-space: nowrap;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(62, 146, 204, .32);
    }

    .btn-submit:focus-visible {
      outline: none;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, .2), 0 12px 28px rgba(62, 146, 204, .32);
    }

    .cta-band {
      position: relative;
      background: radial-gradient(1200px 50% at 50% 0%, rgba(59, 130, 246, .08), transparent), linear-gradient(180deg, #ffffff 0%, #f7faff 100%);
      overflow: hidden;
    }

    .cta-band::before {
      content: "";
      position: absolute;
      inset: -50% -10% -40% -10%;
      background: radial-gradient(circle at 30% 20%, rgba(30, 64, 175, .08), transparent 40%), radial-gradient(circle at 70% 30%, rgba(59, 130, 246, .07), transparent 45%), radial-gradient(circle at 50% 80%, rgba(59, 130, 246, .06), transparent 40%);
      filter: blur(20px);
      animation: bandGlow 16s ease-in-out infinite alternate;
      pointer-events: none;
    }

    @keyframes bandGlow {
      0% {
        transform: translateY(0);
      }

      100% {
        transform: translateY(-20px);
      }
    }

    .cta-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3.25rem 2rem;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    .cta-panel {
      background: linear-gradient(135deg, #f8fbff, #eef4ff);
      border: 1px solid var(--gray-100);
      border-radius: 16px;
      padding: 1.6rem;
      transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
      box-shadow: 0 10px 28px rgba(0, 0, 0, .06);
    }

    .cta-panel:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(0, 0, 0, .1);
      border-color: #e1e8ff;
    }

    .cta-panel h3 {
      color: var(--primary-blue);
      margin-bottom: .75rem;
    }

    .cta-actions {
      display: flex;
      gap: .75rem;
      flex-wrap: wrap;
      align-items: center;
      margin-top: 1rem;
    }

    .footer {
      background: var(--dark-navy);
      color: #fff;
    }

    .footer-container {
      max-width: 1400px;
      margin: 0 auto;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 4rem;
      margin-bottom: 3rem;
      padding: 4rem 2rem 0;
    }

    .footer-brand {
      display: flex;
      align-items: center;
      gap: .75rem;
      margin-bottom: 1.5rem;
    }

    .footer-description {
      color: rgba(255, 255, 255, .7);
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }

    .footer-title {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }

    .footer-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .footer-links a {
      color: rgba(255, 255, 255, .7);
      text-decoration: none;
      transition: color .3s ease;
    }

    .footer-links a:hover {
      color: var(--accent-blue);
    }

    .social-links {
      display: flex;
      gap: 1rem;
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
      color: white;
    }

    .social-link:hover {
      background: var(--accent-blue);
      transform: translateY(-3px);
    }

    .footer-bottom {
      border-top: 1px solid rgba(255, 255, 255, .1);
      padding: 2rem;
      display: flex;
      justify-content: center;    
      align-items: center;
      color: rgba(255, 255, 255, .6);
    }

    .footer-bottom-links {
      display: flex;
      gap: 2rem;
    }

    .footer-bottom-links a {
      color: rgba(255, 255, 255, .6);
      text-decoration: none;
      transition: color .3s ease;
    }

    .footer-bottom-links a:hover {
      color: white;
    }

    @media (max-width:1024px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
      }
    }

    @media (max-width:768px) {
      .footer-grid {
        grid-template-columns: 1fr;
      }

      .footer-bottom {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
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
      -webkit-tap-highlight-color: transparent;
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
      transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
    }

    .whatsapp-inner img {
      width: 34px;
      height: 34px;
    }

    .whatsapp-ripple {
      position: absolute;
      inset: 0;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(37, 211, 102, .25), transparent 60%);
      animation: whatsapp-pulse 2.2s ease-out infinite;
      pointer-events: none;
    }

    .whatsapp-float:hover .whatsapp-inner {
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 16px 32px rgba(0, 0, 0, .28), 0 6px 16px rgba(0, 0, 0, .22);
      background: #1ebe5b;
    }

    .whatsapp-float:active .whatsapp-inner {
      transform: translateY(0) scale(0.97);
      box-shadow: 0 6px 18px rgba(0, 0, 0, .26), 0 2px 8px rgba(0, 0, 0, .2);
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
      transition: transform .6s ease, opacity .6s ease;
    }

    .reveal.show {
      opacity: 1;
      transform: none;
    }

    @media (max-width:1024px) {
      .hero-wrap {
        grid-template-columns: 1fr;
      }

      .featured-grid {
        grid-template-columns: 1fr;
      }

      .cta-inner {
        grid-template-columns: 1fr;
      }

      .stats {
        grid-template-columns: 1fr 1fr;
        bottom: -64px;
        width: min(100%, calc(100% - 24px));
      }
    }

    @media (max-width:768px) {
      .hero h1 {
        font-size: 2.2rem;
      }

      .hero-content {
        padding: 1.25rem;
      }

      .hero-cta {
        gap: .75rem;
      }

      .stats {
        grid-template-columns: 1fr;
        bottom: -72px;
        gap: .75rem;
      }

      .hero {
        padding-bottom: 8.5rem;
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
        <li><a href="<?= BASE_URL ?>amc" class="btn-primary" style="padding: 0.75rem 2rem;">Get AMC Quote</a></li>
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
        <li><a href="<?= BASE_URL ?>amc" class="btn-primary" style="display:inline-block; text-align:center;">Get AMC
            Quote</a></li>
      </ul>
    </div>
  </header>

  <section class="hero">
    <div class="hero-wrap">
      <div class="hero-content">
        <div class="hero-kicker">Trusted Security Experts</div>
        <h1 class="animate fade">Our Expert Security Services</h1>
        <p class="animate fade">Comprehensive Security Solutions for Homes and Businesses.</p>
        <div class="hero-cta">
          <a class="btn btn-primary" href="<?= BASE_URL ?>index#contact">Get a Free Consultation</a>
          <a class="btn btn-whatsapp" href="https://wa.me/911234567890" target="_blank">WhatsApp Us</a>
        </div>
      </div>
      <div class="hero-media animate slide"></div>
    </div>
    <div class="stats">
      <div class="stat animate fade">
        <div class="stat-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 7h18M6 3h12v8a6 6 0 11-12 0V3z"></path>
          </svg>
        </div>
        <div>
          <h3>1000+</h3>
          <p>Cameras Maintained</p>
        </div>
      </div>
      <div class="stat animate fade">
        <div class="stat-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 12h18M12 3v18"></path>
          </svg>
        </div>
        <div>
          <h3>98%</h3>
          <p>Uptime Promise</p>
        </div>
      </div>
      <div class="stat animate fade">
        <div class="stat-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 6v6l4 2"></path>
          </svg>
        </div>
        <div>
          <h3>24/7</h3>
          <p>Emergency Support</p>
        </div>
      </div>
    </div>
  </section>

  <section class="featured">
    <div class="featured-inner">
      <div class="featured-header">
        <div class="featured-kicker">Handpicked Services</div>
        <h2 class="animate fade">Featured Services</h2>
      </div>
      <div class="featured-grid">
        <div class="featured-card animate fade reveal">
          <span class="feature-tag">Popular</span>
          <img class="feature-media" src="<?= BASE_URL ?>img/CCTVSurveillanceSolutions.jpg" alt="CCTV AMC" />
          <div class="feature-body">
            <div class="feature-title">CCTV AMC Services</div>
            <div class="feature-desc">Ensure continuous operation with maintenance, repairs, and priority support.</div>
            <div class="feature-actions">
              <a class="btn btn-primary quote-btn" href="#our-services" data-service="CCTV AMC Services">Request a
                Quote</a>
            </div>
          </div>
        </div>
        <div class="featured-card animate fade reveal">
          <span class="feature-tag">Recommended</span>
          <img class="feature-media" src="<?= BASE_URL ?>images/cctv.jpg" alt="CCTV Installation" />
          <div class="feature-body">
            <div class="feature-title">CCTV Installation</div>
            <div class="feature-desc">Professional installation with HD cameras and remote monitoring.</div>
            <div class="feature-actions">
              <a class="btn btn-primary quote-btn" href="#our-services" data-service="CCTV Installation">Request a
                Quote</a>
            </div>
          </div>
        </div>
        <div class="featured-card animate fade reveal">
          <img class="feature-media" src="<?= BASE_URL ?>img/NetworkingSolutions.jpg" alt="Access Control" />
          <div class="feature-body">
            <div class="feature-title">Access Control Systems</div>
            <div class="feature-desc">Keycard and biometric solutions for offices and properties.</div>
            <div class="feature-actions">
              <a class="btn btn-primary quote-btn" href="#our-services" data-service="Access Control Systems">Request a
                Quote</a>
            </div>
          </div>
        </div>
        <div class="featured-card animate fade reveal">
          <img class="feature-media" src="<?= BASE_URL ?>img/SmartHomeSecuritysolutions.jpg" alt="Alarm Systems" />
          <div class="feature-body">
            <div class="feature-title">Alarm Systems</div>
            <div class="feature-desc">Smart alarms with notifications and emergency response.</div>
            <div class="feature-actions">
              <a class="btn btn-primary quote-btn" href="#our-services" data-service="Alarm Systems">Request a Quote</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="catalog" id="our-services">
    <div class="catalog-inner">
      <div class="catalog-header">
        <h2>Our Services</h2>
      </div>
      <div class="catalog-grid">
        <?php
        $items = [
          ["title" => "CCTV AMC Services", "desc" => "Maintenance with rapid repairs and priority support.", "img" => BASE_URL . "img/CCTVSurveillanceSolutions.jpg"],
          ["title" => "CCTV Installation", "desc" => "HD cameras with professional setup and monitoring.", "img" => BASE_URL . "images/cctv.jpg"],
          ["title" => "Access Control Systems", "desc" => "Biometric and keycard solutions for secure entry.", "img" => BASE_URL . "img/NetworkingSolutions.jpg"],
          ["title" => "Alarm Systems", "desc" => "Smart alarms with instant alerts and response.", "img" => BASE_URL . "img/SmartHomeSecuritysolutions.jpg"],
          ["title" => "Intercom Solutions", "desc" => "Clear video/audio visitor verification and access.", "img" => BASE_URL . "images/client3.jpg"],
          ["title" => "Networking Solutions", "desc" => "Reliable networks for cameras and security gear.", "img" => BASE_URL . "img/NetworkingSolutions.jpg"],
          ["title" => "Video Door Phones", "desc" => "Hands-free video door communication systems.", "img" => BASE_URL . "images/client2.jpg"],
          ["title" => "Biometric Attendance", "desc" => "Accurate attendance with biometric devices.", "img" => BASE_URL . "img/essl.png"],
          ["title" => "Smart Home Security", "desc" => "Integrated smart security for modern homes.", "img" => BASE_URL . "img/security-camera.png"],
        ];
        $count = 0;
        foreach ($items as $s) {
          if ($count >= 9)
            break;
          echo '<div class="service-card reveal">';
          echo '<img class="service-thumb" src="' . $s['img'] . '" alt="' . htmlspecialchars($s['title'], ENT_QUOTES) . '" />';
          echo '<div class="service-body">';
          echo '<div class="service-title">' . $s['title'] . '</div>';
          echo '<div class="service-desc">' . $s['desc'] . '</div>';
          echo '<div class="service-actions"><a href="#" class="btn-quote quote-btn" data-service="' . htmlspecialchars($s['title'], ENT_QUOTES) . '">Request a Quote</a></div>';
          echo '</div></div>';
          $count++;
        }
        ?>
      </div>
    </div>
  </section>

  <section class="cta-band">
    <div class="cta-inner">
      <div class="cta-panel animate fade reveal">
        <h3>Get in Touch Today</h3>
        <p>Secure your property with expert solutions tailored to your needs.</p>
        <div class="cta-actions">
          <a class="btn btn-primary" href="<?= BASE_URL ?>index#contact">Get a Free Quote</a>
          <a class="btn btn-secondary" href="tel:+911234567890">Call Us</a>
        </div>
      </div>
      <div class="cta-panel animate fade reveal">
        <h3>Prefer Messaging?</h3>
        <p>Reach out on WhatsApp for quick assistance.</p>
        <div class="cta-actions">
          <a class="btn btn-whatsapp" href="https://wa.me/911234567890" target="_blank">WhatsApp Us</a>
        </div>
      </div>
    </div>
  </section>

  <div class="quote-modal" id="quoteModal">
    <div class="quote-box">
      <div class="quote-head">
        <span>Request a Quote</span>
        <button class="quote-close" id="quoteClose">&times;</button>
      </div>
      <div class="quote-body">
        <form id="quoteForm">
          <div class="form-group">
            <label for="qservice">Service</label>
            <select id="qservice" disabled>
              <?php
              foreach ($items as $s) {
                echo '<option value="' . htmlspecialchars($s['title'], ENT_QUOTES) . '">' . $s['title'] . '</option>';
              }
              ?>
            </select>
            <input type="hidden" id="qserviceHidden" name="service" />
          </div>
          <div class="form-group">
            <label for="qname">Your Name</label>
            <input id="qname" name="name" type="text" placeholder="Enter your name" />
          </div>
          <div class="form-group">
            <label for="qphone">Phone Number</label>
            <input id="qphone" name="phone" type="tel" placeholder="Enter your phone number" />
          </div>
          <div class="form-group">
            <label for="qemail">Email</label>
            <input id="qemail" name="email" type="email" placeholder="Enter your email" />
          </div>
          <div class="form-group">
            <label for="qmessage">Your Message</label>
            <textarea id="qmessage" name="message" rows="4" placeholder="Tell us about your services needs..."></textarea>
          </div>
          <div class="form-actions">
            <button type="button" class="btn-cancel" id="quoteCancel">Cancel</button>
            <button type="submit" class="btn-submit">Submit Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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
    document.querySelectorAll('.animate').forEach((el, i) => { setTimeout(() => { el.style.opacity = '1'; }, 100 + i * 100); });
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    mobileMenuBtn.addEventListener("click", () => { mobileMenu.classList.toggle("active"); });
    const header = document.getElementById("header");
    window.addEventListener("scroll", () => { if (window.scrollY > 50) { header.classList.add("scrolled"); } else { header.classList.remove("scrolled"); } });
    const observer = new IntersectionObserver((entries) => { entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); } }); }, { threshold: .15 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    const modal = document.getElementById('quoteModal');
    const qselect = document.getElementById('qservice');
    const qhidden = document.getElementById('qserviceHidden');
    const qclose = document.getElementById('quoteClose');
    const qcancel = document.getElementById('quoteCancel');
    document.querySelectorAll('.quote-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const svc = btn.dataset.service;
        Array.from(qselect.options).forEach(opt => { if (opt.value === svc) { qselect.value = svc; } });
        qhidden.value = svc;
        modal.classList.add('active');
      });
    });
    qclose.addEventListener('click', () => modal.classList.remove('active'));
    qcancel.addEventListener('click', () => modal.classList.remove('active'));
    modal.addEventListener('click', (e) => { if (e.target === modal) { modal.classList.remove('active'); } });
    document.getElementById('quoteForm').addEventListener('submit', (e) => {
      e.preventDefault();
      modal.classList.remove('active');
      alert('Thanks! Your quote request has been recorded.');
      e.target.reset();
    });
  </script>
</body>

</html>