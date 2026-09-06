# Security Policy

Please report suspected vulnerabilities privately to **majdbayer77@gmail.com**.

Do not publish credentials, private keys, student/user data, exploit details, or production environment information in a public issue before remediation.

Priority reports include authentication/authorization bypass, protected-course or video-access bypass, account/order data exposure, unsafe uploads, injection, session/token leakage, and administrative privilege issues.

Runtime credentials must remain in environment configuration or provider-managed secret stores. Any credential that has ever entered Git history must be rotated/revoked at the provider even after source cleanup.

Security fixes target the current default branch and maintained application paths.
