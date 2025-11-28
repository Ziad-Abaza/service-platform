@extends('filament::auth.login')

@section('content')
    <style>
        /* Beautiful gradient background with animated elements */
        body.fi-auth-layout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #fec163 75%, #ffecd2 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Floating geometric shapes */
        .bg-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }
        
        .shape1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #48dbfb, #0abde3);
            border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            top: 60%;
            right: 10%;
            animation-delay: 3s;
        }
        
        .shape3 {
            width: 150px;
            height: 150px;
            background: linear-gradient(45deg, #ff9ff3, #feca57);
            border-radius: 41% 59% 41% 59% / 41% 59% 59% 41%;
            bottom: 20%;
            left: 20%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(0px) rotate(180deg); }
            75% { transform: translateY(20px) rotate(270deg); }
        }
        
        /* Completely transparent form */
        .fi-auth-card {
            background: rgba(255, 255, 255, 0.05) !important;
            backdrop-filter: blur(25px) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2) !important;
            border-radius: 24px !important;
        }
        
        /* Enhanced form styling */
        .fi-auth-form {
            padding: 3rem 2rem !important;
        }
        
        .fi-fo-input {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #333 !important;
            backdrop-filter: blur(15px) !important;
            transition: all 0.3s ease !important;
            border-radius: 16px !important;
            padding: 16px 20px !important;
            font-size: 16px !important;
        }
        
        .fi-fo-input:focus {
            background: rgba(255, 255, 255, 0.15) !important;
            border-color: rgba(254, 202, 87, 0.6) !important;
            box-shadow: 0 0 0 4px rgba(254, 202, 87, 0.15) !important;
            color: #333 !important;
            transform: translateY(-1px) !important;
        }
        
        .fi-fo-input::placeholder {
            color: rgba(51, 51, 51, 0.5) !important;
            font-weight: 500 !important;
        }
        
        .fi-fo-checkbox {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
            border-radius: 8px !important;
        }
        
        .fi-ta-button {
            background: linear-gradient(135deg, rgba(254, 202, 87, 0.9), rgba(255, 159, 243, 0.9)) !important;
            border: none !important;
            color: #333 !important;
            font-weight: 700 !important;
            padding: 16px 32px !important;
            border-radius: 16px !important;
            box-shadow: 0 8px 25px rgba(254, 202, 87, 0.3) !important;
            transition: all 0.3s ease !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            font-size: 14px !important;
            backdrop-filter: blur(10px) !important;
        }
        
        .fi-ta-button:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 12px 35px rgba(254, 202, 87, 0.5) !important;
            background: linear-gradient(135deg, rgba(255, 159, 243, 0.9), rgba(254, 202, 87, 0.9)) !important;
        }
        
        .fi-ta-button:active {
            transform: translateY(-1px) !important;
        }
        
        /* Brand styling */
        .fi-auth-brand {
            text-align: center !important;
            margin-bottom: 3rem !important;
        }
        
        .fi-auth-brand h1 {
            color: #333 !important;
            font-weight: 800 !important;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1) !important;
            font-size: 2.5rem !important;
            margin-bottom: 0.5rem !important;
        }
        
        .fi-auth-brand p {
            color: rgba(51, 51, 51, 0.7) !important;
            font-weight: 600 !important;
            font-size: 1.1rem !important;
        }
        
        /* Label styling */
        .fi-fo-label {
            color: #333 !important;
            font-weight: 700 !important;
            margin-bottom: 0.75rem !important;
            font-size: 14px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }
        
        /* Link styling */
        .fi-link {
            color: #333 !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            border-bottom: 2px solid transparent !important;
            transition: all 0.3s ease !important;
        }
        
        .fi-link:hover {
            color: #feca57 !important;
            border-bottom-color: #feca57 !important;
        }
        
        /* Error messages */
        .fi-form-error-message {
            background: rgba(255, 107, 107, 0.1) !important;
            color: #ff6b6b !important;
            border: 1px solid rgba(255, 107, 107, 0.2) !important;
            backdrop-filter: blur(15px) !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        
        /* Form sections */
        .fi-form-section {
            margin-bottom: 2rem !important;
        }
        
        /* Remember me checkbox */
        .fi-fo-checkbox-wrapper {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            margin: 1.5rem 0 !important;
        }
        
        .fi-fo-checkbox-wrapper label {
            color: #333 !important;
            font-weight: 600 !important;
            cursor: pointer !important;
        }
        
        /* Social login buttons (if any) */
        .fi-social-login {
            margin-top: 2rem !important;
            padding-top: 2rem !important;
            border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        
        /* Dark mode support */
        .dark body.fi-auth-layout {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f3460 50%, #533483 75%, #c06c84 100%) !important;
        }
        
        .dark .fi-fo-input {
            color: #e5e5e5 !important;
        }
        
        .dark .fi-fo-input::placeholder {
            color: rgba(229, 229, 229, 0.5) !important;
        }
        
        .dark .fi-auth-brand h1,
        .dark .fi-auth-brand p,
        .dark .fi-fo-label,
        .dark .fi-fo-checkbox-wrapper label {
            color: #e5e5e5 !important;
        }
        
        .dark .fi-link {
            color: #e5e5e5 !important;
        }
        
        .dark .fi-link:hover {
            color: #feca57 !important;
        }
    </style>
    
    <!-- Animated background shapes -->
    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>
    <div class="bg-shape shape3"></div>
    
    @parent
@endsection
