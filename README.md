# EZ Medicine — Medical Courses Platform

[English](README.md) | [العربية](README_AR.md)

> A Laravel-based medical education platform for managing paid courses, doctors, protected video content, student accounts, ratings, favourites, orders, and administrative workflows.

## Overview

EZ Medicine is an online medical learning platform built to organize and deliver paid educational courses. The application combines a public-facing course experience with authenticated student features and a protected administration dashboard.

The current repository keeps the Laravel application inside the [`EZM/`](EZM/) directory. That structure is preserved intentionally to avoid breaking existing paths or deployment assumptions.

The platform supports the full learning journey around medical courses: course discovery, doctor attribution, account registration and verification, course ordering, approval-controlled access, video lessons, favourites, ratings, profile history, and administrative content management.

## Core Capabilities

### Student Experience

The public and authenticated learning experience includes:

- medical course discovery;
- course pricing and doctor information;
- user registration and authentication;
- email verification;
- Google sign-in through Laravel Socialite;
- user profiles;
- favourite courses;
- course ratings and comments;
- order history;
- enrolled / purchased course history;
- protected course video pages;
- contact / inquiry submission;
- informational sections such as benefits, goals, achievements, FAQ, and about content.

The home page presents EZ Medicine as a specialized medical education platform and exposes medical courses, instructors, pricing, learner feedback, and FAQ content.

## Paid Course Access Workflow

Course access is not exposed as an unrestricted video library.

The implemented flow is based on authenticated orders and approval state:

1. a verified user selects a course;
2. the user submits an order with payment-proof imagery;
3. the order is stored with the selected course and user;
4. an administrator reviews and updates the order status;
5. course/video access is guarded by payment-related middleware;
6. authorized learners can access the protected course content.

This repository should therefore be described as a paid-course platform with approval-controlled content access rather than as a fully automated payment-gateway implementation.

## Course Domain Model

Courses are first-class entities and are linked to:

- doctors / instructors;
- discounts;
- orders;
- videos;
- favourites;
- ratings.

Course and user records use UUID-style identifiers generated at creation time in the current model implementation.

## Administration Dashboard

The `/dashboard` area is protected by authentication and an admin middleware layer.

Administrative workflows include management of:

- website content;
- doctors;
- discounts / offers;
- courses;
- videos;
- inquiries;
- ratings;
- users;
- benefits;
- FAQ content;
- goals;
- achievements;
- orders.

The admin interface also includes search and update operations across several of these resources.

## Video & Content Protection

Protected learning routes use middleware to verify authentication, email verification, and course payment/order state before allowing access to video sections.

The application also contains a temporary URL-generation flow around video access. This mechanism is part of the current implementation and should be reviewed separately during a future security/runtime audit before being treated as a hardened DRM solution.

## Authentication

The current authentication stack includes:

- Laravel authentication routes;
- email verification;
- Laravel Sanctum support;
- Google OAuth login through Laravel Socialite;
- authenticated profile routes;
- admin-specific authorization middleware.

## Technology Stack

| Area | Technologies |
| --- | --- |
| Backend | PHP 8.1+, Laravel 10 |
| Authentication | Laravel Auth, Sanctum, Socialite |
| Frontend | Blade templates, Bootstrap 5, Sass |
| Asset Pipeline | Vite 5 |
| HTTP / Integrations | Guzzle, Google API client libraries |
| Content Sanitization | HTML Purifier |
| Testing | PHPUnit 10 |

## Repository Structure

```text
.
├── EZM/                        # Main Laravel application
│   ├── app/                    # Models, controllers, middleware, application logic
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/              # Blade views, Sass and frontend assets
│   ├── routes/                 # Web/API/channel/console routes
│   ├── tests/
│   ├── composer.json
│   └── package.json
├── README.md
├── README_AR.md
└── تقرير_منصة_كورسات_طبية_مدفوعة_EZM.pdf
```

The application remains under `EZM/` to preserve the current repository layout and avoid introducing path-related regressions during documentation cleanup.

## Development

From the Laravel application directory:

```bash
cd EZM
composer install
npm install
npm run dev
```

Typical Laravel environment setup is also required before running the application locally, including an application environment file, application key, database configuration, and migrations.

For a production build of frontend assets:

```bash
npm run build
```

## Testing

The project includes PHPUnit configuration and Laravel test tooling. Runtime, migration, authentication, media-access and order-flow tests should be executed before claiming a verified production baseline.

This README documents the implemented repository structure and behavior; it does not claim that all tests currently pass.

## Security Notes

Several routes are protected through authentication, verification, admin middleware, and payment/order checks. However, course-video protection and temporary URL behavior should be treated as application-level access control, not as a guarantee against content capture or redistribution.

Secrets, OAuth credentials and production configuration must remain outside source control.

## Project Positioning

EZ Medicine is best presented as a **medical e-learning and paid course management platform** with:

- structured course administration;
- doctor/instructor management;
- protected educational video access;
- student account workflows;
- favourites and ratings;
- order and approval handling;
- configurable informational website content.

---

Built as a Laravel-based medical education platform with connected student, content, order and administration workflows.
