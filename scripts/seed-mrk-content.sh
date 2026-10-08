#!/usr/bin/env bash
set -euo pipefail
LIVE="$1"
mkdir -p /tmp/mrk-services

create_service() {
  local slug="$1" title="$2" area="$3" excerpt="$4" content="$5"
  local id
  id="$(terminus wp "$LIVE" -- post list --post_type=mrk_service --name="$slug" --field=ID --format=ids | head -n 1)"
  if [[ -n "$id" ]]; then echo "Keeping existing service: $slug"; return; fi
  printf '%s\n' "$content" > "/tmp/mrk-services/$slug.html"
  id="$(terminus wp "$LIVE" -- post create "/tmp/mrk-services/$slug.html" --post_type=mrk_service --post_status=publish --post_title="$title" --post_name="$slug" --post_excerpt="$excerpt" --meta_input="{\"_mrk_seo_description\":\"$excerpt\"}" --porcelain)"
  term_id="$(terminus wp "$LIVE" -- term get mrk_service_area "$area" --by=name --field=term_id 2>/dev/null || true)"
  if [[ -z "$term_id" ]]; then terminus wp "$LIVE" -- term create mrk_service_area "$area" --porcelain >/dev/null; fi
  terminus wp "$LIVE" -- post term set "$id" mrk_service_area "$area" --by=name
  echo "Created service: $slug (ID $id)"
}

create_service "wordpress-website-development" "WordPress Website Development" "Web & App Development" "Responsive WordPress websites with clean structure, service pages, calls to action and SEO-ready foundations." "<h2>Professional WordPress Website Development</h2><p>MRK Digital Center builds responsive WordPress websites for businesses, services, portfolios and online earning projects. The focus is clean structure, mobile usability and clear calls to action.</p><h3>What is included</h3><ul><li>Responsive WordPress setup</li><li>Business and service pages</li><li>SEO-ready structure</li><li>Mobile navigation and performance improvements</li><li>Deployment and maintenance</li></ul>"
create_service "web-app-development" "Web and App Development" "Web & App Development" "Practical websites and web applications built around business workflows, forms, dashboards and custom features." "<h2>Web and App Development</h2><p>MRK Digital Center develops practical web applications and software solutions around real business workflows.</p><h3>Typical solutions</h3><ul><li>Business websites and web applications</li><li>Custom dashboards and forms</li><li>Python and Django development</li><li>API-connected workflows</li><li>HTML, CSS and JavaScript work</li></ul>"
create_service "plc-industrial-automation" "PLC and Industrial Automation" "PLC & Industrial Automation" "PLC programming and industrial automation support for control, monitoring, pumps, sensors and process workflows." "<h2>PLC and Industrial Automation</h2><p>MRK Digital Center provides PLC programming and industrial automation support for control, monitoring and troubleshooting tasks.</p><h3>Automation work</h3><ul><li>PLC logic development</li><li>Motor, pump and sensor control</li><li>Control-panel troubleshooting</li><li>Process automation planning</li><li>Testing and documentation</li></ul>"
create_service "arduino-esp32-projects" "Arduino and ESP32 Projects" "Arduino / ESP32" "Arduino and ESP32 automation prototypes using sensors, relays, monitoring, wireless control and practical IoT workflows." "<h2>Arduino and ESP32 Projects</h2><p>MRK Digital Center develops Arduino and ESP32 prototypes for monitoring, control and automation.</p><h3>Example applications</h3><ul><li>Automatic water tank controllers</li><li>Sensor and relay automation</li><li>Temperature and level monitoring</li><li>ESP32 Wi-Fi controls</li><li>Prototype IoT devices</li></ul>"
create_service "graphic-design" "Graphic Design Services" "Graphic Design" "Business cards, posters, flex, social graphics, invitations and website artwork prepared for the required platform." "<h2>Graphic Design Services</h2><p>MRK Digital Center creates practical graphics for businesses, digital services and local organizations.</p><h3>Design services</h3><ul><li>Business and digital cards</li><li>Posters, flex and promotional artwork</li><li>Social media graphics</li><li>Website graphics</li><li>Invitations</li></ul>"
create_service "digital-online-services" "Digital and Online Services" "Digital & Online Services" "Practical assistance with online workflows, digital documents, government service guidance and online earning setup." "<h2>Digital and Online Services</h2><p>MRK Digital Center helps individuals and businesses with common digital workflows and online service tasks.</p><h3>Common support</h3><ul><li>Online government service assistance</li><li>Business forms and documents</li><li>Fiverr and Upwork setup</li><li>Canva and Office work</li><li>Website and digital profile support</li></ul>"
create_service "seo-blogging" "SEO and Blogging" "SEO & Digital Marketing" "Search-friendly site structure, metadata, internal linking, structured data and useful original blog content." "<h2>SEO and Blogging</h2><p>MRK Digital Center builds useful search-friendly website content around real customer questions and services.</p><h3>SEO work</h3><ul><li>Titles and meta descriptions</li><li>Internal linking and clean URLs</li><li>Structured data where appropriate</li><li>Service landing pages</li><li>Helpful original blog content</li></ul><p>No ranking position can be guaranteed.</p>"
create_service "mobile-software-services" "Mobile Software Services" "Mobile Software" "Android software troubleshooting, device setup, app configuration and practical mobile software assistance." "<h2>Mobile Software Services</h2><p>MRK Digital Center provides mobile software support such as device setup, software troubleshooting and Android assistance.</p><h3>Software support</h3><ul><li>Android troubleshooting</li><li>Application and settings assistance</li><li>Device configuration and backup guidance</li><li>Software diagnostics</li><li>App setup support</li></ul>"

PRIVACY_ID="$(terminus wp "$LIVE" -- post list --post_type=page --name=privacy-policy --field=ID --format=ids | head -n 1)"
if [[ -z "$PRIVACY_ID" ]]; then
  cat > /tmp/mrk-privacy.html <<'EOF'
<h2>Privacy Policy</h2>
<p>MRK Digital Center respects your privacy. This website may receive information that you voluntarily submit through contact, quote or service-request forms. We use that information to respond to requests, provide services and maintain the website.</p>
<h3>Cookies and third-party services</h3>
<p>WordPress and selected third-party services may use cookies or similar technologies for essential functionality, security, analytics or advertising when enabled.</p>
<h3>Information sharing</h3>
<p>We do not intentionally sell personal information. Information may be shared with a service provider when necessary to operate a requested service, comply with a legal obligation or protect website security.</p>
<h3>Contact</h3>
<p>For privacy questions about information submitted through this website, please use the Contact page.</p>
<p><em>This general policy should be reviewed and updated to match the site's actual plugins, analytics and advertising configuration.</em></p>
EOF
  PRIVACY_ID="$(terminus wp "$LIVE" -- post create /tmp/mrk-privacy.html --post_type=page --post_status=publish --post_title="Privacy Policy" --post_name="privacy-policy" --porcelain)"
  terminus wp "$LIVE" -- option update wp_page_for_privacy_policy "$PRIVACY_ID"
fi
terminus wp "$LIVE" -- rewrite flush
terminus env:clear-cache "$LIVE"
echo "MRK content seeding completed."
