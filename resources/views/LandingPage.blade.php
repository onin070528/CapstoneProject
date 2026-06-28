@extends('layouts.app')
@section('title', 'iTOUR - Davao Oriental')
@section('content')

<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Inter', sans-serif;
        background: #f0f5f6;
        color: #1a2e35;
    }

    /* ─── NAV ─── */
    .lp-nav {
        position: sticky;
        top: 0;
        z-index: 100;
        background: #fff;
        border-bottom: 1px solid #e2eaec;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
    }
    .lp-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .lp-logo-icon {
        width: 36px;
        height: 36px;
        background: #004e5b;
        color: #fff;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 13px;
        letter-spacing: -0.5px;
    }
    .lp-logo-text { display: flex; flex-direction: column; }
    .lp-logo-text span:first-child {
        font-size: 17px;
        font-weight: 800;
        color: #004e5b;
        line-height: 1;
        letter-spacing: -0.5px;
    }
    .lp-logo-text span:last-child {
        font-size: 8px;
        font-weight: 700;
        color: #6b7f84;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        margin-top: 2px;
    }
    .lp-navlinks {
        display: flex;
        gap: 2rem;
        list-style: none;
    }
    .lp-navlinks a {
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        color: #4a5d63;
        transition: color 0.2s;
    }
    .lp-navlinks a:hover,
    .lp-navlinks a.active { color: #004e5b; font-weight: 600; }
    .lp-nav-auth { display: flex; align-items: center; gap: 1rem; }
    .lp-nav-auth a.login-btn {
        font-size: 14px;
        font-weight: 600;
        color: #004e5b;
        text-decoration: none;
    }
    .lp-nav-auth a.register-btn {
        background: #004e5b;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 6px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .lp-nav-auth a.register-btn:hover { background: #003842; }

    /* ─── HERO ─── */
    .lp-hero {
        position: relative;
        min-height: calc(100vh - 64px);
        display: flex;
        align-items: center;
        overflow: hidden;
    }
    .lp-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        z-index: 0;
    }
    .lp-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,46,55,0.95) 0%, rgba(4,78,91,0.88) 45%, rgba(11,100,119,0.65) 100%);
        z-index: 1;
    }
    .lp-hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 2rem;
        width: 100%;
    }
    .lp-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 50px;
        background: rgba(255,255,255,0.1);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 24px;
        backdrop-filter: blur(4px);
    }
    .lp-hero-badge-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: #52ebd3;
    }
    .lp-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #fff;
        line-height: 1.12;
        letter-spacing: -0.5px;
        margin-bottom: 20px;
        max-width: 700px;
    }
    .lp-hero h1 .highlight { color: #52ebd3; }
    .lp-hero-desc {
        font-size: 16px;
        color: rgba(255,255,255,0.82);
        line-height: 1.7;
        max-width: 580px;
        margin-bottom: 36px;
        font-weight: 300;
    }
    .lp-hero-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-bottom: 56px;
    }
    .btn-explore {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #10b981;
        color: #fff;
        padding: 13px 24px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .btn-explore:hover { background: #059669; }
    .btn-register-tourist {
        background: #fff;
        color: #004e5b;
        padding: 13px 24px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .btn-register-tourist:hover { background: #f0faf8; }
    .btn-establishments {
        border: 1.5px solid rgba(255,255,255,0.35);
        color: #fff;
        background: rgba(255,255,255,0.06);
        padding: 13px 24px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        backdrop-filter: blur(4px);
        transition: border-color 0.2s, background 0.2s;
    }
    .btn-establishments:hover {
        border-color: #fff;
        background: rgba(255,255,255,0.12);
    }
    .lp-hero-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border: 1px solid rgba(255,255,255,0.15);
        background: rgba(255,255,255,0.07);
        backdrop-filter: blur(6px);
        border-radius: 14px;
        padding: 24px 28px;
        max-width: 620px;
        gap: 0;
    }
    .hero-stat {
        display: flex;
        flex-direction: column;
        padding: 4px 0;
    }
    .hero-stat + .hero-stat {
        border-left: 1px solid rgba(255,255,255,0.12);
        padding-left: 24px;
    }
    .hero-stat-val {
        font-size: 28px;
        font-weight: 800;
        color: #fff;
        line-height: 1;
        margin-bottom: 6px;
    }
    .hero-stat-label {
        font-size: 10px;
        font-weight: 700;
        color: rgba(255,255,255,0.55);
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    /* ─── SECTION WRAPPERS ─── */
    .lp-section {
        padding: 72px 2rem;
    }
    .lp-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .section-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #1a9e7c;
        margin-bottom: 12px;
    }
    .section-title {
        font-size: clamp(1.6rem, 3vw, 2rem);
        font-weight: 800;
        color: #0e2d35;
        margin-bottom: 8px;
        letter-spacing: -0.3px;
    }
    .section-subtitle {
        font-size: 15px;
        color: #5a7880;
        margin-bottom: 36px;
    }
    .section-divider {
        border: none;
        border-top: 1px solid #d6e8eb;
        margin-bottom: 36px;
    }

    /* ─── TOURISM STATISTICS ─── */
    .lp-stats-section { background: #edf4f6; }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }
    .stat-card {
        background: #fff;
        border: 1px solid #d8eaed;
        border-radius: 10px;
        padding: 22px 20px;
    }
    .stat-card-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #6b9aa2;
        margin-bottom: 10px;
    }
    .stat-card-value {
        font-size: 2rem;
        font-weight: 800;
        color: #0a5e6e;
        line-height: 1;
        margin-bottom: 4px;
    }
    .stat-card-desc {
        font-size: 12px;
        color: #7fa4ab;
    }

    /* ─── FEATURED DESTINATIONS ─── */
    .lp-destinations-section { background: #fff; }
    .dest-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 0;
    }
    .dest-header-left { flex: 1; }
    .btn-view-all {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1.5px solid #c5d8dc;
        background: #fff;
        color: #0a5e6e;
        font-size: 13px;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        transition: border-color 0.2s, background 0.2s;
        white-space: nowrap;
    }
    .btn-view-all:hover { border-color: #0a5e6e; background: #f0faf8; }
    .destinations-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 32px;
    }
    .dest-card {
        background: #fff;
        border: 1px solid #ddeaed;
        border-radius: 12px;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .dest-card:hover {
        box-shadow: 0 8px 24px rgba(0,78,91,0.12);
        transform: translateY(-2px);
    }
    .dest-card-img {
        position: relative;
        height: 190px;
        overflow: hidden;
    }
    .dest-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .dest-card-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(0,78,91,0.85);
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 4px;
        backdrop-filter: blur(4px);
    }
    .dest-card-badge.beach { background: rgba(2,132,199,0.88); }
    .dest-card-badge.landscape { background: rgba(22,101,52,0.88); }
    .dest-card-badge.marine { background: rgba(8,145,178,0.88); }
    .dest-card-badge.falls { background: rgba(21,128,61,0.88); }
    .dest-card-badge.heritage { background: rgba(120,53,15,0.88); }
    .dest-card-badge.museum { background: rgba(109,40,217,0.88); }
    .dest-card-body { padding: 18px 20px; }
    .dest-card-name {
        font-size: 16px;
        font-weight: 700;
        color: #0e2d35;
        margin-bottom: 6px;
    }
    .dest-card-location {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 13px;
        color: #5a7880;
        margin-bottom: 12px;
    }
    .dest-card-location svg { color: #e05252; flex-shrink: 0; }
    .dest-card-link {
        font-size: 13px;
        font-weight: 600;
        color: #0a8e72;
        text-decoration: none;
    }
    .dest-card-link:hover { text-decoration: underline; }

    /* ─── SERVICES ─── */
    .lp-services-section { background: #edf4f6; }
    .services-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }
    .service-card {
        background: #fff;
        border: 1px solid #d8eaed;
        border-radius: 10px;
        padding: 24px 20px;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .service-card:hover {
        box-shadow: 0 6px 20px rgba(0,78,91,0.1);
        transform: translateY(-2px);
    }
    .service-icon {
        font-size: 28px;
        margin-bottom: 14px;
        display: block;
    }
    .service-card-title {
        font-size: 15px;
        font-weight: 700;
        color: #0e2d35;
        margin-bottom: 8px;
    }
    .service-card-desc {
        font-size: 13px;
        color: #6a8e96;
        line-height: 1.55;
        margin-bottom: 16px;
    }
    .service-card-link {
        font-size: 13px;
        font-weight: 600;
        color: #0a8e72;
    }

    /* ─── USER PORTALS ─── */
    .lp-portals-section { background: #fff; }
    .portals-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .portal-card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #c8dfe3;
        text-decoration: none;
        color: inherit;
    }
    .portal-card-header {
        background: #004e5b;
        padding: 22px 24px;
        color: #fff;
    }
    .portal-card-header.establishment { background: #136b5a; }
    .portal-card-header.personnel { background: #1e6b7a; }
    .portal-type-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.65);
        margin-bottom: 8px;
    }
    .portal-card-title {
        font-size: 18px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 6px;
        line-height: 1.2;
    }
    .portal-card-subtitle {
        font-size: 13px;
        color: rgba(255,255,255,0.72);
    }
    .portal-card-body {
        background: #fff;
        padding: 22px 24px;
        border-top: none;
    }
    .portal-features {
        list-style: none;
        margin-bottom: 22px;
    }
    .portal-features li {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #4a6b72;
        padding: 4px 0;
    }
    .portal-features li::before {
        content: '✓';
        color: #0a8e72;
        font-weight: 700;
        flex-shrink: 0;
    }
    .btn-access-portal {
        display: block;
        width: 100%;
        text-align: center;
        background: #004e5b;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        padding: 13px;
        border-radius: 6px;
        text-decoration: none;
        transition: background 0.2s;
    }
    .btn-access-portal:hover { background: #003842; }

    /* ─── ANNOUNCEMENTS ─── */
    .lp-announcements-section { background: #edf4f6; }
    .announcements-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 0;
    }
    .announcements-list {
        background: #fff;
        border: 1px solid #d4e6ea;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 28px;
    }
    .announcement-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 24px;
        border-bottom: 1px solid #e6f0f2;
        text-decoration: none;
        color: inherit;
        transition: background 0.15s;
    }
    .announcement-item:last-child { border-bottom: none; }
    .announcement-item:hover { background: #f5fbfc; }
    .announcement-tag {
        flex-shrink: 0;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 4px;
        min-width: 72px;
        text-align: center;
    }
    .tag-advisory { background: #fef9c3; color: #a16207; border: 1px solid #fde68a; }
    .tag-weather { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
    .tag-festival { background: #fce7f3; color: #9d174d; border: 1px solid #fbcfe8; }
    .tag-guideline { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
    .tag-update { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
    .announcement-content { flex: 1; }
    .announcement-title {
        font-size: 14px;
        font-weight: 600;
        color: #0e2d35;
        margin-bottom: 2px;
    }
    .announcement-date {
        font-size: 12px;
        color: #8aafb7;
    }
    .announcement-arrow {
        color: #9ab4ba;
        font-size: 18px;
        flex-shrink: 0;
    }

    /* ─── FOOTER ─── */
    .lp-footer {
        background: #0e2d35;
        color: #fff;
        padding: 52px 2rem 0;
    }
    .lp-footer-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .footer-grid {
        display: grid;
        grid-template-columns: 1.8fr 1.2fr 1.2fr 1fr;
        gap: 48px;
        padding-bottom: 40px;
    }
    .footer-brand-icon {
        width: 40px; height: 40px;
        background: #1a5c6b;
        color: #fff;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 12px;
    }
    .footer-brand-name {
        font-size: 18px;
        font-weight: 800;
        color: #fff;
        display: block;
        line-height: 1;
        letter-spacing: -0.5px;
    }
    .footer-brand-province {
        font-size: 8px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.45);
        display: block;
        margin-top: 3px;
    }
    .footer-brand-desc {
        margin-top: 16px;
        font-size: 13px;
        color: rgba(255,255,255,0.5);
        line-height: 1.7;
    }
    .footer-col-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.45);
        margin-bottom: 18px;
    }
    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 13px;
        color: rgba(255,255,255,0.65);
        margin-bottom: 10px;
        line-height: 1.5;
    }
    .footer-contact-item .fi { flex-shrink: 0; margin-top: 2px; }
    .footer-links {
        list-style: none;
    }
    .footer-links li { margin-bottom: 10px; }
    .footer-links a {
        font-size: 13px;
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-links a:hover { color: #52ebd3; }
    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 18px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12px;
        color: rgba(255,255,255,0.35);
    }
    .footer-bottom a {
        color: rgba(255,255,255,0.45);
        text-decoration: none;
    }
    .footer-bottom a:hover { color: #52ebd3; }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 900px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .destinations-grid { grid-template-columns: repeat(2, 1fr); }
        .services-grid { grid-template-columns: repeat(2, 1fr); }
        .portals-grid { grid-template-columns: 1fr; }
        .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
        .lp-hero-stats { grid-template-columns: repeat(2, 1fr); max-width: 380px; }
        .hero-stat + .hero-stat { border-left: none; padding-left: 0; }
        .hero-stat:nth-child(3),
        .hero-stat:nth-child(4) { border-top: 1px solid rgba(255,255,255,0.12); padding-top: 16px; }
    }
    @media (max-width: 600px) {
        .lp-nav { padding: 0 1rem; }
        .lp-navlinks { display: none; }
        .lp-section { padding: 48px 1rem; }
        .stats-grid { grid-template-columns: 1fr; }
        .destinations-grid { grid-template-columns: 1fr; }
        .services-grid { grid-template-columns: 1fr; }
        .footer-grid { grid-template-columns: 1fr; }
        .lp-hero-btns { flex-direction: column; }
    }
</style>

<div class="lp-wrapper">

    <!-- ═══ NAVIGATION ═══ -->
    <header class="lp-nav">
        <a href="/" class="lp-logo">
            <div class="lp-logo-icon">iT</div>
            <div class="lp-logo-text">
                <span>iTOUR</span>
                <span>DAVAO ORIENTAL</span>
            </div>
        </a>

        <ul class="lp-navlinks">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#destinations">Destinations</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portals">Portals</a></li>
            <li><a href="#announcements">Announcements</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="lp-nav-auth">
            <a href="{{ route('login') }}" class="login-btn">Login</a>
            <a href="#" class="register-btn">Register Visit</a>
        </div>
    </header>

    <!-- ═══ HERO SECTION ═══ -->
    <section class="lp-hero">
        <div class="lp-hero-bg"></div>
        <div class="lp-hero-overlay"></div>
        <div class="lp-hero-content">
            <div class="lp-hero-badge">
                <span class="lp-hero-badge-dot"></span>
                Provincial Tourism Office · Davao Oriental
            </div>

            <h1>
                Explore, Experience, and Discover <span class="highlight">Davao Oriental</span> with iTOUR
            </h1>

            <p class="lp-hero-desc">
                An Integrated Tourism Information and Monitoring System that connects tourists, accredited establishments, and the Provincial Tourism Office through tourism information, visitor monitoring, and experience analytics.
            </p>

            <div class="lp-hero-btns">
                <a href="#destinations" class="btn-explore">
                    Explore Destinations
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
                <a href="#" class="btn-register-tourist">Register as Tourist</a>
                <a href="#" class="btn-establishments">View Establishments</a>
            </div>

            <div class="lp-hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-val">12.8K+</span>
                    <span class="hero-stat-label">Arrivals</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-val">87</span>
                    <span class="hero-stat-label">Establishments</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-val">25</span>
                    <span class="hero-stat-label">Destinations</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-val">92%</span>
                    <span class="hero-stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ TOURISM STATISTICS ═══ -->
    <section class="lp-section lp-stats-section">
        <div class="lp-section-inner">
            <span class="section-tag">Tourism Statistics</span>
            <h2 class="section-title">Davao Oriental tourism at a glance</h2>
            <p class="section-subtitle">Key figures from registered visits and accredited establishments.</p>
            <hr class="section-divider">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-label">Total Tourist Arrivals</div>
                    <div class="stat-card-value">12,847</div>
                    <div class="stat-card-desc">Year to date</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-label">Accredited Establishments</div>
                    <div class="stat-card-value">87</div>
                    <div class="stat-card-desc">Across 10 municipalities</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-label">Tourist Destinations</div>
                    <div class="stat-card-value">25</div>
                    <div class="stat-card-desc">Beaches · Falls · Heritage</div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-label">Tourist Satisfaction Rate</div>
                    <div class="stat-card-value">92%</div>
                    <div class="stat-card-desc">From verified feedback</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ FEATURED DESTINATIONS ═══ -->
    <section class="lp-section lp-destinations-section" id="destinations">
        <div class="lp-section-inner">
            <div class="dest-header">
                <div class="dest-header-left">
                    <span class="section-tag">Featured Destinations</span>
                    <h2 class="section-title">Discover the wonders of Davao Oriental</h2>
                    <p class="section-subtitle">Explore the province's most loved beaches, falls, and heritage sites.</p>
                </div>
                <a href="#" class="btn-view-all">View all destinations →</a>
            </div>
            <hr class="section-divider" style="margin-top: 0;">

            <div class="destinations-grid">
                <!-- Dahican Beach -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&auto=format&fit=crop" alt="Dahican Beach">
                        <span class="dest-card-badge beach">Beach</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Dahican Beach</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>

                <!-- Sleeping Dinosaur -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1559128010-7c1ad6e1b6a5?w=600&auto=format&fit=crop" alt="Sleeping Dinosaur">
                        <span class="dest-card-badge landscape">Landscape</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Sleeping Dinosaur</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>

                <!-- Pujada Bay -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1544550581-5f7ceaf7f992?w=600&auto=format&fit=crop" alt="Pujada Bay">
                        <span class="dest-card-badge marine">Marine Reserve</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Pujada Bay</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>

                <!-- Aliwagwag Falls -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?w=600&auto=format&fit=crop" alt="Aliwagwag Falls">
                        <span class="dest-card-badge falls">Falls</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Aliwagwag Falls</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>

                <!-- Cape San Agustin -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?w=600&auto=format&fit=crop" alt="Cape San Agustin">
                        <span class="dest-card-badge heritage">Heritage</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Cape San Agustin</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>

                <!-- Subangan Museum -->
                <a href="#" class="dest-card">
                    <div class="dest-card-img">
                        <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?w=600&auto=format&fit=crop" alt="Subangan Museum">
                        <span class="dest-card-badge museum">Museum</span>
                    </div>
                    <div class="dest-card-body">
                        <div class="dest-card-name">Subangan Museum</div>
                        <div class="dest-card-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            Davao Oriental
                        </div>
                        <span class="dest-card-link">View Details →</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══ TOURIST SERVICES ═══ -->
    <section class="lp-section lp-services-section" id="services">
        <div class="lp-section-inner">
            <span class="section-tag">Tourist Services</span>
            <h2 class="section-title">Everything you need before you go</h2>
            <p class="section-subtitle">Quick access to the essential services for visitors of Davao Oriental.</p>
            <hr class="section-divider">
            <div class="services-grid">
                <a href="#" class="service-card">
                    <span class="service-icon">🗺️</span>
                    <div class="service-card-title">Travel Guide</div>
                    <div class="service-card-desc">Itineraries, tips, and routes across the province.</div>
                    <span class="service-card-link">Open Guide →</span>
                </a>
                <a href="#" class="service-card">
                    <span class="service-icon">🚌</span>
                    <div class="service-card-title">Transportation Information</div>
                    <div class="service-card-desc">Buses, vans, boats, and ferry schedules.</div>
                    <span class="service-card-link">View Routes →</span>
                </a>
                <a href="#" class="service-card">
                    <span class="service-icon">🆘</span>
                    <div class="service-card-title">Emergency Services</div>
                    <div class="service-card-desc">Police, hospital, fire, and coast guard hotlines.</div>
                    <span class="service-card-link">View Hotlines →</span>
                </a>
                <a href="#" class="service-card">
                    <span class="service-icon">📋</span>
                    <div class="service-card-title">Tourist Registration</div>
                    <div class="service-card-desc">Register your visit in seconds via QR or form.</div>
                    <span class="service-card-link">Register Now →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══ USER PORTAL ACCESS ═══ -->
    <section class="lp-section lp-portals-section" id="portals">
        <div class="lp-section-inner">
            <span class="section-tag">User Portal Access</span>
            <h2 class="section-title">Choose your portal</h2>
            <p class="section-subtitle">Tailored access for tourists, accredited establishments, and Provincial Tourism Office personnel.</p>
            <hr class="section-divider">
            <div class="portals-grid">
                <!-- Public Tourist -->
                <div class="portal-card">
                    <div class="portal-card-header">
                        <div class="portal-type-label">Public Tourist</div>
                        <div class="portal-card-title">Public Tourist Portal</div>
                        <div class="portal-card-subtitle">Plan your trip and share your experience.</div>
                    </div>
                    <div class="portal-card-body">
                        <ul class="portal-features">
                            <li>Explore destinations</li>
                            <li>Register visits</li>
                            <li>Submit feedback</li>
                        </ul>
                        <a href="#" class="btn-access-portal">Access Portal →</a>
                    </div>
                </div>

                <!-- Accredited Establishment -->
                <div class="portal-card">
                    <div class="portal-card-header establishment">
                        <div class="portal-type-label">Establishment</div>
                        <div class="portal-card-title">Accredited Establishment Portal</div>
                        <div class="portal-card-subtitle">Manage your tourism business with iTOUR.</div>
                    </div>
                    <div class="portal-card-body">
                        <ul class="portal-features">
                            <li>Manage establishment profile</li>
                            <li>Access QR code</li>
                            <li>Monitor tourist arrivals</li>
                        </ul>
                        <a href="#" class="btn-access-portal" style="background:#136b5a;">Access Portal →</a>
                    </div>
                </div>

                <!-- Tourism Personnel -->
                <div class="portal-card">
                    <div class="portal-card-header personnel">
                        <div class="portal-type-label">Tourism Personnel</div>
                        <div class="portal-card-title">Tourism Personnel Portal</div>
                        <div class="portal-card-subtitle">Provincial Tourism Office monitoring &amp; reports.</div>
                    </div>
                    <div class="portal-card-body">
                        <ul class="portal-features">
                            <li>Monitor tourist arrivals</li>
                            <li>Manage establishments</li>
                            <li>Generate reports</li>
                        </ul>
                        <a href="#" class="btn-access-portal" style="background:#1e6b7a;">Access Portal →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ ANNOUNCEMENTS ═══ -->
    <section class="lp-section lp-announcements-section" id="announcements">
        <div class="lp-section-inner">
            <div class="announcements-header">
                <div>
                    <span class="section-tag">Latest Announcements</span>
                    <h2 class="section-title">Stay informed before you travel</h2>
                </div>
                <a href="#" class="btn-view-all" style="margin-bottom: 8px;">All announcements →</a>
            </div>
            <hr class="section-divider" style="margin-top: 16px;">

            <div class="announcements-list">
                <a href="#" class="announcement-item">
                    <span class="announcement-tag tag-advisory">ADVISORY</span>
                    <div class="announcement-content">
                        <div class="announcement-title">Tourism Office Advisory: Updated visitor guidelines now in effect.</div>
                        <div class="announcement-date">Today</div>
                    </div>
                    <span class="announcement-arrow">→</span>
                </a>
                <a href="#" class="announcement-item">
                    <span class="announcement-tag tag-weather">WEATHER</span>
                    <div class="announcement-content">
                        <div class="announcement-title">Weather Advisory: Light to moderate rains expected in coastal Mati this weekend.</div>
                        <div class="announcement-date">Today</div>
                    </div>
                    <span class="announcement-arrow">→</span>
                </a>
                <a href="#" class="announcement-item">
                    <span class="announcement-tag tag-festival">FESTIVAL</span>
                    <div class="announcement-content">
                        <div class="announcement-title">Upcoming Festival: Pujada Bay Festival schedule and entry pass released.</div>
                        <div class="announcement-date">2 days ago</div>
                    </div>
                    <span class="announcement-arrow">→</span>
                </a>
                <a href="#" class="announcement-item">
                    <span class="announcement-tag tag-guideline">GUIDELINE</span>
                    <div class="announcement-content">
                        <div class="announcement-title">Travel Guidelines: Updated visitor registration procedure for surf events.</div>
                        <div class="announcement-date">5 days ago</div>
                    </div>
                    <span class="announcement-arrow">→</span>
                </a>
                <a href="#" class="announcement-item">
                    <span class="announcement-tag tag-update">UPDATE</span>
                    <div class="announcement-content">
                        <div class="announcement-title">Destination Update: Aliwagwag Falls viewing deck reopens this week.</div>
                        <div class="announcement-date">1 week ago</div>
                    </div>
                    <span class="announcement-arrow">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══ FOOTER ═══ -->
    <footer class="lp-footer" id="contact">
        <div class="lp-footer-inner">
            <div class="footer-grid">
                <!-- Brand -->
                <div>
                    <div class="footer-brand-icon">iT</div>
                    <span class="footer-brand-name">iTOUR</span>
                    <span class="footer-brand-province">DAVAO ORIENTAL</span>
                    <p class="footer-brand-desc">
                        Provincial Tourism Office of Davao Oriental — the official tourism information and monitoring platform for the province.
                    </p>
                </div>

                <!-- Contact Details -->
                <div>
                    <div class="footer-col-title">Contact Details</div>
                    <div class="footer-contact-item">
                        <span>📍</span>
                        <span>Provincial Capitol, Mati City, Davao Oriental</span>
                    </div>
                    <div class="footer-contact-item">
                        <span>📞</span>
                        <span>(087) 388-5555</span>
                    </div>
                    <div class="footer-contact-item">
                        <span>✉️</span>
                        <span>info@itour.davaoorienatal.gov.ph</span>
                    </div>
                </div>

                <!-- Emergency Contacts -->
                <div>
                    <div class="footer-col-title">Emergency Contacts</div>
                    <div class="footer-contact-item">
                        <span>🚔</span>
                        <span>Police - (087) 388-3293</span>
                    </div>
                    <div class="footer-contact-item">
                        <span>🏥</span>
                        <span>Hospital - (087) 811-1234</span>
                    </div>
                    <div class="footer-contact-item">
                        <span>🚒</span>
                        <span>Fire - (087) 388-3160</span>
                    </div>
                    <div class="footer-contact-item">
                        <span>⚓</span>
                        <span>Coast Guard - (087) 388-4444</span>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <div class="footer-col-title">Quick Links</div>
                    <ul class="footer-links">
                        <li><a href="#destinations">Destinations</a></li>
                        <li><a href="#services">Tourist Services</a></li>
                        <li><a href="#portals">User Portals</a></li>
                        <li><a href="#announcements">Announcements</a></li>
                        <li><a href="#">Register Visit</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>© 2026 Provincial Tourism Office of Davao Oriental. All rights reserved.</span>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

</div>
@endsection
