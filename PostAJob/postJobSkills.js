//Mobile Functionality
const mobileSearchCard = document.querySelector(".mobileSearchCard");
const searchIcon = document.getElementById("mobileSearch");
searchIcon.addEventListener("click", () => {
  mobileSearchCard.style.display = "inline-block";
  searchIcon.style.display = "none";
  navIcon.style.opacity = "0";
  exitSearch.style.display = "inline-block";
});
const exitSearch = document.querySelector(".fa-times");
exitSearch.addEventListener("click", () => {
  mobileSearchCard.style.display = "none";
  searchIcon.style.display = "inline-block";
  navIcon.style.opacity = "1";
  exitSearch.style.display = "none";
});

//Developement and IT
const DevelopementITPopular = [
  "JavaScript Developers",
  "Web Designers",
  "WordPress Developers",
  "HTML Developers",
  "CSS Developers",
  "PHP Developers",
  "Python Developers",
  "Android Developers",
  "Shopify Developers",
  "Landing Page Specialists",
  "API Integration Freelancers",
  "HTML5 Developers",
  "React.js Developers",
  "Java Developers",
  "Node.js Developers & Programmers",
  "Web Application Freelancers",
  "Mobile App Developers",
  "MySQL Developers",
  "Android App Developers",
  "Woocommerce Developers",
];
const DevelopementITRoles = [
  "AngularJS Developers",
  "AWS Developers",
  "C# Developers",
  "C++ Developers",
  "CSS Developers",
  "Data Analysts",
  "Data Visualization Consultants",
  "Developers",
  "DevOps Engineers",
  "eCommerce Developers",
  "Front End Developers",
  "Full Stack Developers",
  "Game Developers",
  "Golang Developers",
  "HTML5 Developers",
  "Machine Learning Engineers",
  "Magento Developers",
  "Mobile App Developers",
  "MySQL Developers",
  "Python Developers",
  "React Native Developers",
  "Ruby Developers",
  "Ruby on Rails Developers",
  "Rust Developers",
  "Scala Developers",
  "Shopify Developers",
  "Software Developers",
  "Software QA Testers",
  "Unity 3D Developers",
  "Vue JS Developers",
  "Web Developers",
  "WordPress Developers",
];
const DevelopementITCrossFunctionalRoles = [
  "2D Animators",
  "3D Designers",
  "Amazon FBA Specialists",
  "Conversion Rate Optimizers",
  "Copywriters",
  "Data Entry Specialists",
  "Data Scrapers",
  "Database Programmers",
  "Digital Marketers",
  "Graphic Designers",
  "Microsoft Access Consultants",
  "Network Engineers",
  "Power BI Consultants",
  "Product Managers",
  "Product Marketers",
  "Project Managers",
  "Salesforce App Developers",
  "SEO Experts",
  "Tableau Experts",
  "Translators",
  "UI Designers",
  "UX Designers",
  "Web Designers",
];
const DevelopementITProjects = [
  "Chatbot Services",
  "Cybersecurity & Data Protection Services",
  "Data Analysis & Report Services",
  "Database Services",
  "Desktop Application Services",
  "Development for Streamer Services",
  "eCommerce Development Services",
  "File Conversion Services",
  "Game Development Services",
  "Mobile App Development Services",
  "Online Coding Lessons",
  "QA Services",
  "Support & IT Services",
  "User Testing Services",
  "Web Programming Services",
  "Website & CMS Software Services",
  "WordPress Development Services",
];
const Data = [
  "Databases",
  "Data Analytics",
  "Data Processing",
  "Data Visualization",
  "Data Engineering",
  "Data Science",
  "Data Entry",
];
const AllDevelopmentIT = DevelopementITPopular.concat(DevelopementITRoles)
  .concat(DevelopementITCrossFunctionalRoles)
  .concat(DevelopementITProjects)
  .concat(Data);

// Design and Creative
const DesignCreativePopular = [
  "Graphic Designers",
  "Adobe Photoshop Experts",
  "Adobe Illustrator Experts",
  "Video Editors",
  "Logo Designers",
  "Illustrators",
  "Video Producers",
  "Adobe After Effects Specialists",
  "Animators",
  "Brand Identity & Guidelines Freelancers",
  "Photo Editors",
  "Adobe Premiere Pro Specialists",
  "Video Post Editing Specialists",
  "Adobe InDesign Experts",
  "Print Designers",
  "Infographic Designers",
  "Motion Graphics Designers",
  "Videographers",
  "Audio Editors",
  "2D Animators",
];
const DesignCreativeRoles = [
  "2D Animators",
  "2D Designers",
  "2D Game Artists",
  "3D Animators",
  "3D Designers",
  "3D Modelers",
  "Adobe After Effects Experts",
  "Adobe Illustrator Experts",
  "Adobe InDesign Experts",
  "Adobe Photoshop Experts",
  "Animators",
  "Audio Engineers",
  "Audiobook Narrators",
  "Banner Designers",
  "Book Cover Designers",
  "Brand Strategists",
  "Brochure Designers",
  "Business Card Designers",
  "Caricature Artists",
  "Flyer Designers",
  "Infographic Designers",
  "Instructional Designers",
  "Logo Designers",
  "Mobile UI Designers",
  "Packaging Designers",
  "Photo Editors",
  "Photo Retouchers",
  "Photographers",
  "Podcasting Freelancers",
  "Poster Designers",
  "T-Shirt Designers",
  "Video Producers",
];
const DesignCreativeProjects = [
  "3D Product Animation Services",
  "App & Website Promo Videos Services",
  "AR Filters & Lenses Services",
  "Architecture & Interior Design Services",
  "Banner Ad Services",
  "Book Design Services",
  "Brand Style Guide Services",
  "Building Information Modeling Services",
  "Business Cards & Stationery Design Services",
  "Cartoons & Comics Services",
  "Character Animation Services",
  "Character Modeling Services",
  "Flyer Design Services",
  "Game Design Services",
  "Graphics for Streamers Services",
  "Illustration Services",
  "Industrial & Product Design Services",
  "Infographic Design Services",
  "Landscape Design Services",
  "Logo Animation Services",
  "Logo Design Services",
  "Packaging Design Services",
  "Pattern Design Services",
  "Photoshop Editing Services",
  "Podcast Cover Art Services",
  "Portraits & Caricatures Services",
  "Presentation Design Services",
  "Product Photography Services",
  "Resume Design Services",
  "Social Media Design Services",
  "T-Shirts & Merchandise Design Services",
  "Web & Mobile Design Services",
];
const DesignCreativeSpecialy = [
  "Brand Identity Design",
  "Logo Design",
  "Singing",
  "Acting",
  "Voice Talent",
  "Visual Effects",
  "2D Animation",
  "Video Editing",
  "Video Production",
  "Motion Graphics",
  "Videography",
  "3D Animation",
  "Packaging Design",
  "Art Direction",
  "Image Editing",
  "Presentation Design",
  "Creative Direction",
  "Editorial Design",
  "Cartoons & Comics",
  "Pattern Design",
  "Fine Art",
  "Caricatures & Portraits",
  "Illustration",
  "Musician",
  "Music Composition",
  "Music Production",
  "Audio Editing",
  "Audio Production",
  "Fashion Design",
  "Jewelry Design",
  "Product & Industrial Design",
  "AR/VR Design",
  "Game Art",
  "Product Photography",
  "Local Photography ",
];
const GraphicsDesign = [
  "Logo Design",
  "Brand Style Guides",
  "Game Art",
  "Graphics for Streamers",
  "Business Cards & Stationery",
  "Illustration",
  "Pattern Design",
  "Packaging & Label Design",
  "Brochure Design",
  "Poster Design",
  "Signage Design",
  "Flyer Design",
  "Book Design",
  "Album Cover Design",
  "Podcast Cover Art",
  "Website Design",
  "App Design",
  "UX Design",
  "Landing Page Design",
  "Social Media Design",
  "Email Design",
  "Icon Design",
  "AR Filters & Lenses",
  "Catalog Design",
  "Invitation Design",
  "Portraits & Caricatures",
  "Cartoons & Comics",
  "Tattoo Design",
  "Web Banners",
  "Photoshop Editing",
  "Architecture & Interior Design",
  "Landscape Design",
  "Building Information Modeling",
  "Character Modeling",
  "Industrial & Product Design",
  "Trade Booth Design",
  "Fashion Design",
  "T-Shirts & Merchandise",
  "Jewelry Design",
  "Presentation Design",
  "Infographic Design",
  "Resume Design",
  "Storyboards",
  "Car Wraps",
  "Menu Design",
  "Postcard Design",
  "Vector Tracing",
  "Twitch Store",
];
const videoAnimation = [
  "Whiteboard & Animated Explainers",
  "Video Editing",
  "Short Video Ads",
  "Character Animation",
  "Animated GIFs",
  "Logo Animation",
  "Intros & Outros",
  "Lyric & Music Videos",
  "E-Commerce Product Videos",
  "3D Product Animation",
  "Unboxing Videos",
  "Live Action Explainers",
  "Corporate Videos",
  "Crowdfunding Videos",
  "Spokespersons Videos",
  "Visual Effects",
  "Subtitles & Captions",
  "Lottie & Website Animation",
  "Animation for Kids",
  "App & Website Previews",
  "eLearning Video Production",
  "Slideshows Videos",
  "Screencasting Videos",
  "Game Trailers",
  "Book Trailers",
  "Animation for Streamers",
  "Article to Video",
  "Real Estate Promos",
  "Product Photography",
  "Local Photography",
  "Drone Videography",
];
const MusicAudio = [
  "Voice Over",
  "Mixing & Mastering",
  "Producers & Composers",
  "Singers & Vocalists",
  "Session Musicians",
  "Online Music Lessons",
  "Songwriters",
  "Beat Making",
  "Podcast Editing",
  "Audiobook Production",
  "Audio Ads Production",
  "Sound Design",
  "Dialogue Editing",
  "Music Transcription",
  "Vocal Tuning",
  "Jingles & Intros",
  "DJ Drops & Tags",
  "DJ Mixing",
  "Remixing & Mashups",
  "Synth Presets",
  "Meditation Music",
];
const AllCreativeDesign = DesignCreativePopular.concat(DesignCreativeRoles)
  .concat(DesignCreativeProjects)
  .concat(GraphicsDesign)
  .concat(MusicAudio)
  .concat(videoAnimation);

//Sales & Marketing
const SalesMarketingPopular = [
  "Social Media Marketers",
  "Facebook Freelancers",
  "SEO Experts",
  "Instagram Marketers",
  "Lead Generation Experts",
  "Instagram Freelancers",
  "Social Media Managers",
  "Marketing Strategists",
  "Google Analytics Experts",
  "Facebook Ad Campaign Freelancers",
  "Facebook Ads Specialists",
  "Instagram Ad Campaign Freelancers",
  "Email Marketers",
  "SEO Keyword Researchers",
  "Internet Marketers",
  "Campaign Managers",
  "Cold Callers",
  "Influencer Marketers",
  "Conversion Rate Optimizers",
  "Telemarketers",
];
const SalesMarketingRoles = [
  "Adwords Experts",
  "Affiliate Marketers",
  "Amazon SEO Experts",
  "Blog Writers",
  "Content Marketers",
  "Digital Marketers",
  "Email Marketers",
  "Email Marketing Consultants",
  "Facebook Marketers",
  "Google Analytics Consultants",
  "Google Tag Managers",
  "Instagram Marketers",
  "Internet Marketers",
  "Lead Generators",
  "Link Builders",
  "Mailchimp Freelancers",
  "Marketing Automation Experts",
  "Marketing Consultants",
  "Marketing Strategists",
  "Pinterest Marketers",
  "PPC Specialists",
  "Search Engine Marketers",
  "SEO Audit Freelancers",
  "SEO Experts",
  "Social Media Managers",
  "Social Media Marketers",
  "Telemarketers",
  "Yoast SEO Freelancers",
  "YouTube Marketers",
];
const SalesMarketingCrossFunctional = [
  "Amazon Seller Central Experts",
  "App Designers",
  "BigCommerce Developers",
  "Blog Writers",
  "Brand Managers",
  "Cold Callers",
  "Data Entry Specialists",
  "Editors",
  "Explainer Video Freelancers",
  "Full Stack Developers",
  "Game Developers",
  "Google Cloud Platform Freelancers",
  "Google Data Studio Experts",
  "Graphic Designers",
  "HubSpot Freelancers",
  "Infographic Designers",
  "Internet Researchers",
  "Microsoft Excel Experts",
  "Microsoft Word Experts",
  "PHP Developers",
  "Presentation Designers",
  "Project Managers",
  "Shopify Developers",
  "Spreadsheet Experts",
  "Squarespace Developers",
  "Virtual Assistants",
  "Web Developers",
  "Web Scrapers",
  "Webflow Freelancers",
  "WooCommerce Developers",
  "WordPress Developers",
];
const SalesMarketingProjects = [
  "Book & eBook Marketing Services",
  "Content Marketing Services",
  "Crowdfunding Services",
  "Domain Research Services",
  "eCommerce Marketing Services",
  "Email Marketing Services",
  "Influencer Marketing Services",
  "Lead Generation Services",
  "Local SEO Services",
  "Market Research Services",
  "Marketing Strategy Services",
  "Mobile Marketing & Advertising Services",
  "Music Promotion Services",
  "Podcast Marketing Services",
  "Public Relations Services",
  "SEM Services",
  "SEO Services",
  "Social Media Advertising Services",
  "Social Media Management Services",
  "Survey Services",
  "Video Marketing Services",
  "Web Analytics Services",
  "Web Traffic Optimization Services",
];
const DigitalMarketing = [
  "Social Media Marketing",
  "Search Engine Optimization (SEO)",
  "Social Media Advertising",
  "Public Relations",
  "Content Marketing",
  "Podcast Marketing",
  "Video Marketing",
  "Email Marketing",
  "Crowdfunding",
  "Search Engine Marketing (SEM)",
  "Display Advertising",
  "Marketing Strategy",
  "Web Analytics",
  "Book & eBook Marketing",
  "Influencer Marketing",
  "Community Management",
  "Local SEO",
  "E-Commerce Marketing",
  "Affiliate Marketing",
  "Mobile App Marketing",
  "Music Promotion",
  "Text Message Marketing",
];
const AllSalesMarketing = SalesMarketingPopular.concat(SalesMarketingRoles)
  .concat(SalesMarketingCrossFunctional)
  .concat(SalesMarketingProjects)
  .concat(DigitalMarketing);

//Writing & Translation
const WritingTranslationPopular = [
  "Chatbot Services",
  "Cybersecurity & Data Protection Services",
  "Data Analysis & Report Services",
  "Database Services",
  "Desktop Application Services",
  "Development for Streamer Services",
  "eCommerce Development Services",
  "File Conversion Services",
  "Game Development Services",
  "Mobile App Development Services",
  "Online Coding Lessons",
  "QA Services",
  "Support & IT Services",
  "User Testing Services",
  "Web Programming Services",
  "Website & CMS Software Services",
  "WordPress Development Services",
];
const WritingTranslationRoles = [
  "Academic Writers",
  "Article Writers",
  "Biography Writers",
  "Blog Writers",
  "Business Plan Writers",
  "Business Writers",
  "Comedy Writers",
  "Content Writers",
  "Copy Editors",
  "Copywriters",
  "Cover Letter Writers",
  "eBook Writers",
  "Essay Writers",
  "Fact Checkers",
  "Fashion Writers",
  "Fiction Writers",
  "Legal Writers",
  "Lyrics Writers",
  "Medical Writers",
  "Online Writers",
  "Press Release Writers",
  "Proposal Writers",
  "RFP Writers",
  "Report Writers",
  "Research Paper Writers",
  "Resume Writers",
  "Sales Writers",
  "Scientific Writers",
  "Screenwriters",
  "SEO Writers",
  "Speech Writers",
  "Technical Writers",
  "Travel Writers",
  "White Paper Writers",
];
const WritingTranslationCrossFunctional = [
  "Amazon SEO Experts",
  "Audiobook Narrators",
  "Book Cover Designers",
  "Call Center Agents",
  "Childrens Book Illustrators",
  "Data Entry Specialists",
  "Digital Marketers",
  "Email Marketers",
  "Excel Experts",
  "Fashion Designers",
  "Graphic Designers",
  "Internet Researchers",
  "Microsoft Office Specialists",
  "Microsoft Word Experts",
  "Podcasting Freelancers",
  "PowerPoint Experts",
  "Project Managers",
  "Research Assistants",
  "Sales Representatives",
  "SEM Specialists",
  "Social Media Managers",
  "Transcriptionists",
  "Twitter Marketers",
  "Video Editors",
  "Video Producers",
  "Virtual Assistants",
  "Wikipedia Specialists",
  "Zoom Video Specialists",
];
const WritingTranslationProjects = [
  "Article & Blog Post Services",
  "Beta Reading Services",
  "Book & eBook Writing Services",
  "Book Editing Services",
  "Brand Voice & Tone Services",
  "Business Names & Slogan Services",
  "Case Study Services",
  "Cover Letter Services",
  "Creative Writing Services",
  "Email Copy Services",
  "Grant Writing Services",
  "Legal Writing Services",
  "LinkedIn Profile Services",
  "Localization Services",
  "Online Language Lessons",
  "Podcast Writing Services",
  "Press Release Services",
  "Product Description Services",
  "Proofreading & Editing Services",
  "Research & Summary Services",
  "Resume Writing Services",
  "Sales Copy Services",
  "Scriptwriting Services",
  "Social Media Copy Services",
  "Speechwriting Services",
  "Technical Writing Services",
  "Transcript Services",
  "Translation Services",
  "UX Writing Services",
  "Website Content Services",
  "White Paper Services",
];
const AllWritingTranslation = WritingTranslationPopular.concat(
  WritingTranslationRoles
)
  .concat(WritingTranslationCrossFunctional)
  .concat(WritingTranslationProjects);

//Admin And Customer
const AdminCustomerPopular = [
  "Internet Researchers",
  "Data Entry Specialists",
  "Virtual Assistants",
  "Customer Service Representatives",
  "Administrative Assistants",
  "Email Handlers",
  "Appointment Setters",
  "Data Scrapers",
  "Customer Support Representatives",
  "Project Managers",
  "File Management Freelancers",
  "Call Center Agents",
  "Chat Support Specialists",
  "Email Support Freelancers",
  "Interpersonal skills Freelancers",
  "Google Docs Experts",
  "Scheduling Freelancers",
  "Canva Graphic Designer",
  "Microsoft Word Experts",
  "Phone Support Agents",
];
const AdminCustomerRoles = [
  "Administrative Assistants",
  "Appointment Setters",
  "Bookkeepers",
  "Customer Service Representatives",
  "Customer Support Representatives",
  "Data Entry Specialists",
  "Data Miners",
  "Editors",
  "Email Handlers",
  "Microsoft Excel Experts",
  "Executive Assistants",
  "Google Docs Experts",
  "Google Sheets Experts",
  "Google Slides Experts",
  "Graphic Designers",
  "HTML Developers",
  "Internet Researchers",
  "Intuit QuickBooks Specialists",
  "Microsoft Office Specialists",
  "Microsoft Outlook Specialists",
  "Microsoft Word Experts",
  "Personal Assistants",
  "PowerPoint Experts",
  "Project Managers",
  "Proofreaders",
  "Recruiters",
  "Research Assistants",
  "Social Media Managers",
  "Transcriptionists",
  "Typists",
  "Virtual Assistants",
  "Cold Callers",
];
const AdminCustomerCrossFunctional = [
  "Social Media Marketers",
  "Adobe Photoshop Experts",
  "Blog Writers",
  "Creative Writers",
  "Excel VBA Developers",
  "Writers",
  "Financial Analysts",
  "Musical Composition Specialists",
  "Press Release Writers",
  "Wikipedia Specialists",
  "Zoom Video Conferencing Specialists",
  "YouTube Marketers",
  "Paralegal Professionals",
  "Etsy Administration Specialists",
  "Lead Generation Specialists",
  "Sales Representatives",
  "Pitch Deck Writers",
  "HubSpot Specialists",
  "Web Scrapers",
  "LinkedIn Specialists",
  "Real Estate Virtual Assistants",
  "Smartsheet Specialists",
  "Tax Preparers",
  "Zendesk Specialists",
  "Chatbot Developers",
  "Presentation Designers",
  "Legal Researchers",
  "PDF Converters",
];
const AdminCustomerProjects = [
  "Project Management Services",
  "Virtual Assistant Services",
  "Data Entry Services",
  "eCommerce Management Services",
  "Flyer Distribution Services",
  "Business Consulting Services",
  "Business Plan Services",
  "Financial Consulting Services",
  "HR Consulting Services",
  "Legal Consulting Services",
];
const AllAdminCustomer = AdminCustomerPopular.concat(AdminCustomerRoles)
  .concat(AdminCustomerCrossFunctional)
  .concat(AdminCustomerProjects);

//Finance And Accounting
const FinanceAccountingPopular = [
  "Accountants",
  "Bookkeepers",
  "Business Planners",
  "Financial Analysts",
  "Business Analysts",
  "Bank Reconciliation Specialists",
  "Tax Preparers",
  "QuickBooks Consultants",
  "Financial Accountants",
  "Business Intelligence Developers",
  "Certified Public Accountants",
  "Tax Law Lawyers & Legal Professionals",
  "Account Reconciliation Specialists",
  "Financial Modelers",
  "Fundraising Consultants",
  "Xero Specialists",
  "Startup Consultants",
  "Communication skills Freelancers",
  "General Ledger Specialists",
  "Accounts Receivable Management",
];
const FinanceAccountingRoles = [
  "Accountants",
  "Accounts Payable Managers",
  "Bookkeepers",
  "Intuit QuickBooks Specialists",
  "Business Consultants",
  "Civil Law Lawyers & Legal Professionals",
  "Consultants",
  "Contract Law Legal Professionals",
  "CPAs",
  "Data Entry Specialists",
  "Excel Experts",
  "Financial Analysts",
  "Financial Managers",
  "Financial Reporting Analysts",
  "Intellectual Property Law Professionals",
  "Intuit TurboTax Specialists",
  "Market Research Analysts",
  "Payroll Processing Specialists",
  "Project Managers",
  "Legal Advisors",
  "Business Analysts",
  "Business Development Specialists",
  "Financial Accountants",
  "Financial Forecasting Specialists",
  "Financial Modelers",
  "Tax Preparers",
  "Forex Traders",
  "Spreadsheet Experts",
  "Financial Planners",
  "Wave Accounting Specialists",
];
const FinanceAccountingCrossFunctional = [
  "Human Resource Managers",
  "Email Marketers",
  "Virtual Assistants",
  "Social Media Consultants",
  "Sales Consultants",
  "SEO Experts",
  "Creative Writers",
  "Customer Service Representatives",
  "Data Entry Specialists",
  "Strategic Planning Specialists",
  "Usability Testing Specialists",
  "Startup Consultants",
  "Regression Testers",
  "Recruiters & Recruitment Consultants",
  "MySQL Programmers",
  "PowerPoint Experts",
  "Microsoft Word Experts",
  "Marketing Strategists",
  "Translators",
  "Google Spreadsheet Experts",
  "Microsoft Power BI Consultants",
  "Legal Consultants",
  "Business Plan Writers",
  "Legal Researchers",
  "Xero Experts",
  "Business Coaches",
  "Corporate Law Professionals",
];
const FinanceAccountingProjects = [
  "Business Consulting Services",
  "Business Plan Services",
  "Financial Consulting Services",
  "HR Consulting Services",
  "Legal Consulting Services",
];
const business = [
  "Virtual Assistant",
  "E-Commerce Management",
  "Market Research",
  "Business Plans",
  "Legal Consulting",
  "Financial Consulting",
  "Sales",
  "Customer Care",
  "Business Consulting",
  "HR Consulting",
  "Presentations",
  "Supply Chain Management",
  "Game Concept Design",
  "Career Counseling",
  "Project Management",
  "Flyer Distribution",
];
const AllFinanceAccounting = FinanceAccountingPopular.concat(
  FinanceAccountingRoles
)
  .concat(FinanceAccountingCrossFunctional)
  .concat(FinanceAccountingProjects)
  .concat(business);

//Legal
const LegalPopular = [
  "Legal Consultants",
  "Contract Law Lawyers & Legal Professionals",
  "Legal Researchers",
  "Contract Drafters",
  "Paralegals Professionals",
  "Corporate Law Lawyers & Legal Professionals",
  "Legal Assistance Specialists",
  "Intellectual Property Law Lawyers & Legal Professionals",
  "Partnership Agreements Freelancers",
  "Trademark Consultants",
  "Business Law Freelancers",
  "Patent Law Lawyers & Legal Professionals",
  "Non-Disclosure Agreements Specialists",
  "Immigration Law Lawyers & Legal Professionals",
  "Compliance Specialists",
  "Civil Law Lawyers & Legal Professionals",
  "Regulatory Compliance Freelancers",
  "Family Law Lawyers & Legal Professionals",
  "Document Reviewers",
  "Litigation Specialists",
];
const LegalRoles = [
  "Real Estate Law Professionals",
  "Compliance Specialists",
  "Legal Consultants",
  "Family Law Professionals",
  "Legal Assistants",
  "Trademark Consultants",
  "Deposition Summary Specialists",
  "Workplace Safety & Health Professionals",
  "Arbitration Law Professionals",
  "Brand Licensing Professionals",
  "Bankruptcy Professionals",
  "Patent Law Professionals",
  "Medical Law Professionals",
  "Immigration Law Professionals",
  "Copyright Law Professionals",
  "Criminal Law Professionals",
  "Notaries",
  "Contract Drafters",
];
const LegalCrossFunctional = [
  "Legal Transcriptionist",
  "Legal Translators",
  "Section 508 Compliance Specialists",
  "Legal Writers",
  "Property Tax Specialists",
  "GDPR Freelancers",
  "Management Consultants",
  "Legal Researchers",
  "Fraud Analysts",
];
const LegalProjects = [
  "Translation Services",
  "Contracts & Agreement Writing",
  "Privay Policy Writing",
  "Terms of Service Writing",
  "Business & Corporate Legal Consulting",
  "Intellectual Property Consulting",
  "Tax Legal Consulting",
  "Commercial Legal Consulting",
  "Legal Assistance",
  "Cybersecurity & Data Protection Services",
  "Virtual Assistant Services",
];
const AllLegal = LegalPopular.concat(LegalRoles)
  .concat(LegalCrossFunctional)
  .concat(LegalProjects);

//HR & Training
const HRTrainingPopular = [
  "Technology Freelancers",
  "Recruiters & Recruitment Consultants",
  "Candidate sourcing Freelancers",
  "Interviewers",
  "LinkedIn Recruiters",
  "Human Resource Managers",
  "Boolean Search Specialists",
  "Technical Recruiters",
  "e-Learning Specialists",
  "Instructional Designers",
  "Online Freelancers",
  "Course Freelancers",
  "Learning Management System (LMS) Specialists",
  "Curriculum Developers",
  "Curriculum design Freelancers",
  "Training & Development Professionals",
  "Articulate Storyline Specialists",
  "Compensation Specialists",
  "Leadership Training Freelancers",
  "Organizational Development Consultant",
];
const lifestyles = [
  "Online Tutoring",
  "Gaming",
  "Astrology & Psychics",
  "Modeling & Acting",
  "Fitness Lessons",
  "Dance Lessons",
  "Life Coaching",
  "Greeting Cards & Videos",
  "Personal Stylists",
  "Cooking Lessons",
  "Craft Lessons",
  "Arts & Crafts",
  "Wellness",
  "Family & Genealogy",
  "Your Message On...",
  "Collectibles",
  "Traveling",
];
const HRTrainingRoles = [
  "Articulate Specialists",
  "Articulate Storyline Specialists",
  "Boolean Search Specialists",
  "Competencies Assessment Freelancers",
  "Curriculum Developers",
  "Distance Education Specialists",
  "Employee Engagement Specialists",
  "Executive Coaches",
  "HR Policies Specialists",
  "Interviewers",
  "ISO 9000 Specialists",
  "Job Description Writers",
  "Leadership Development Specialists",
  "LinkedIn Recruiters",
  "Onboarding Specialists",
  "Online Freelancers",
  "QHSE Specialists",
  "Recruiters & Recruitment Consultants",
  "Salary Surveys Specialists",
  "SAP SuccessFactors Freelancers",
  "SCORM Specialists",
  "Teachable Specialists",
  "Technical Recruiters",
];
const HRTrainingCrossFunctional = [
  "Applied Behavior Analysis (ABA) Professionals",
  "Business Coaches",
  "Business Innovation Freelancers",
  "Career Counselors",
  "Conflict Resolution Specialists",
  "Cross Functional Team Leadership Specialists",
  "Employent Law Lawyers & Legal Professionals",
  "Information Management Specialists",
  "International Business Specialists",
  "Lean Consultants",
  "Learning Management System (LMS) Specialists",
  "Legal Professionals",
  "LinkedIn API Developers",
  "Moodle Specialists",
  "Payroll Processing Specialists",
  "Resume Writers",
  "Revenue Management Freelancers",
];
const HRTrainingProjects = [
  "Accounting & Bookkeeping Services",
  "Business Consulting Services",
  "Cover Letter Writing Services",
  "eLearning Video Production Services",
  "Financial Consulting Services",
  "LinkedIn Profile Writing Services",
  "Project Management Services",
  "Resume Writing Services",
  "Virtual Assistant Services",
];

const AllHRTraining = HRTrainingPopular.concat(HRTrainingRoles)
  .concat(HRTrainingCrossFunctional)
  .concat(HRTrainingProjects)
  .concat(lifestyles);

//Engineer & Architecture
const EngineerArchitecturePopular = [
  "3D Designers",
  "3D Rendering Artists",
  "AutoCAD Drafters",
  "Architectural Designers",
  "Product Designers",
  "Sourcing Specialists",
  "Interior Designers",
  "Residential Freelancers",
  "Architectural Rendering Specialists",
  "2D Designers",
  "SketchUp Specialists",
  "Drafting Specialists",
  "Mechanical Engineers",
  "Electrical Engineers",
  "Floor Plan Designers",
  "CAD Designers",
  "Concept Design Specialists",
  "Logistics & Shipping Specialists",
  "Engineering Drawing Specialists",
  "Mathematics Specialists",
];
const EngineerArchitectureRoles = [
  "3D Printing Experts",
  "3D Rendering Artists",
  "AutoCAD Specialists",
  "Autodesk Fusion 360 Freelancers",
  "Biologists",
  "Chemists",
  "Contract Manufacturing Specialists",
  "Drafting Specialists",
  "Engineering Drawing Specialists",
  "Estimator Specialists",
  "Interior Designers",
  "Logistics & Shipping Specialists",
  "Mathematics Specialists",
  "PCB Designers",
  "Product Designers",
  "Robotics Engineers",
  "SketchUp Specialists",
  "SolidWorks Designers",
  "Sourcing Specialists",
  "Welders",
];
const EngineerArchitectureCrossFunctional = [
  "3D Designers & Artists",
  "Calculus Tutors & Teachers",
  "Game Designer",
  "Graphic Designer",
  "LaTeX Editors",
  "Photographer",
  "Project Managers",
  "Research Specialists",
  "Scientific Writers",
  "Section 508 Compliance Specialists",
  "Urban Designers",
  "Video Producers",
];
const EngineerArchitectureProjects = [
  "Architecture & Interior Design Consultation",
  "BIM 3D Modeling",
  "Packaging Design Services",
  "Product Manufacturing",
  "STEM Consultation & Tutoring",
  "Supplier & Vendor Sourcing",
  "Virtual Staging Services",
];
const AllEngineerArchitecture = EngineerArchitecturePopular.concat(
  EngineerArchitectureRoles
)
  .concat(EngineerArchitectureCrossFunctional)
  .concat(EngineerArchitectureProjects);

//Specialty Arrays
//All Categories
const AllCategories = [
  "Accounting & Consulting",
  "Admin Support",
  "Customer Service",
  "Data Science & Analytics",
  "Design & Creative",
  "Engineering & Architecture",
  "IT & Networking",
  "Legal",
  "Sales & Marketing",
  "Translation",
  "Web, Mobile & Software Dev",
  "Writing",
];

//"Accounting & Consulting'
const AccountingConsultingSpecialty = [
  "Business Analysis",
  "Management Consulting",
  "Instructional Design",
  "HR Administration",
  "Recruiting",
  "Training & Development",
  "Lifestyle Coaching",
  "Tax Preparation",
  "Bookkeeping",
  "Accounting",
  "Financial Management/CFO",
  "Financial Analysis & Modeling",
];

//"Admin Support"
const AdminSupportSpecialty = [
  "Virtual/Administrative Assistance",
  "Data Entry",
  "Project Management",
  "Transcription",
  "Order Processing",
  "Online Research",
];

//"Customer Service"
const CustomerServiceSpecialty = ["Customer Service", "Tech Support "];

//"Data Science & Analytics"
const DataScienceAnalyticsSpecialty = [
  "Data Mining",
  "Data Engineering",
  "Data Analytics",
  "Data Visualization",
  "Data Extraction",
  "Data Processing",
  "Deep Learning",
  "Knowledge Representation",
  "Machine Learning",
  "Experimentation & Testing",
  "A/B Testing",
];

//"Design & Creative",
const DesignCreativeSpecialty = [
  "Brand Identity Design",
  "Logo Design",
  "Singing",
  "Acting",
  "Voice Talent",
  "Visual Effects",
  "2D Animation",
  "Video Editing",
  "Video Production",
  "Motion Graphics",
  "Videography",
  "3D Animation",
  "Packaging Design",
  "Art Direction",
  "Image Editing",
  "Presentation Design",
  "Creative Direction",
  "Editorial Design",
  "Cartoons & Comics",
  "Pattern Design",
  "Fine Art",
  "Caricatures & Portraits",
  "Illustration",
  "Musician",
  "Music Composition",
  "Music Production",
  "Audio Editing",
  "Audio Production",
  "Fashion Design",
  "Jewelry Design",
  "Product & Industrial Design",
  "AR/VR Design",
  "Game Art",
  "Product Photography",
  "Local Photography ",
];

//"Engineering & Architecture
const EngineeringArchitectureSpeciality = [
  "Structural Engineering",
  "Building Information Modeling",
  "Civil Engineering",
  "3D Modeling & Rendering",
  "CAD",
  "Landscape Architecture",
  "Architecture",
  "Interior Design",
  "Trade Show Design",
  "Mechanical Engineering",
  "Chemical & Process Engineering",
  "STEM Tutoring",
  "Energy Engineering",
  "Electronic Engineering",
  "Electrical Engineering",
  "Physics",
  "Mathematics",
  "Biology",
  "Chemistry",
  "Logistics & Supply Chain Management",
  "Sourcing & Procurement",
];

//"IT & Networking"
const ITNetworkingSpecialty = [
  "Network Security",
  "IT Compliance",
  "Information Security",
  "Database Administration",
  "Cloud Engineering",
  "Solutions Architecture",
  "IT Support",
  "DevOps Engineering",
  "Business Applications Development",
  "Systems Engineering",
  "Systems Administration",
  "Network Administration",
];

//"Legal"
const LegalSpecialty = [
  "Business & Corporate Law",
  "General Counsel",
  "Tax Law",
  "Labor & Employment Law",
  "International Law",
  "Regulatory Law",
  "Securities & Finance Law",
  "Immigration Law",
  "Intellectual Property Law",
  "Paralegal",
];

//"Sales & Marketing"
const SalesMarketingSpecialty = [
  "Social Media Strategy",
  "Marketing Strategy",
  "Content Strategy",
  "Brand Strategy",
  "Public Relations",
  "Social Media Marketing",
  "Market Research",
  "Community Management",
  "Email Marketing",
  "Marketing Automation",
  "Campaign Management",
  "Digital Marketing",
  "Search Engine Optimization",
  "Telemarketing",
  "Search Engine Marketing",
  "Lead Generation",
  "Sales & Business Development",
];

//"Translation"
const TranslationSpecialty = [
  "Legal Translation",
  "Technical Translation",
  "Language Tutoring",
  "Translation",
  "Language Localization",
  "Medical Translation",
];

//"Web, Mobile & Software Dev"
const WebMobileSoftwareSpecialty = [
  "Ecommerce Development",
  "Desktop Software Development",
  "Scripting & Automation",
  "Manual Testing",
  "Automation Testing",
  "Mobile App Development",
  "Mobile Game Development",
  "Prototyping",
  "Mobile Design",
  "Web Design",
  "User Research",
  "UX/UI Design",
  "Firmware Development",
  "Emerging Tech",
  "AR/VR Development",
  "Coding Tutoring",
  "Database Development",
  "Scrum Master",
  "Product Management",
  "Back-End Development",
  "Front-End Development",
  "Full Stack Development",
  "CMS Development",
  "Game Development",
];

//"Writing"
const WritingSpecialty = [
  "Editing & Proofreading",
  "Career Coaching",
  "Scriptwriting",
  "Creative Writing",
  "Ghostwriting",
  "Grant Writing",
  "Technical Writing",
  "Writing Tutoring",
  "Business Writing",
  "Content Writing",
  "Copywriting",
];

//All Specialty
const AllSpecialty = WritingSpecialty.concat(WebMobileSoftwareSpecialty)
  .concat(TranslationSpecialty)
  .concat(SalesMarketingSpecialty)
  .concat(LegalSpecialty)
  .concat(ITNetworkingSpecialty)
  .concat(EngineeringArchitectureSpeciality)
  .concat(DesignCreativeSpecialty)
  .concat(DataScienceAnalyticsSpecialty)
  .concat(CustomerServiceSpecialty)
  .concat(AdminSupportSpecialty)
  .concat(AccountingConsultingSpecialty);

//ALL SKILLS
const AllSkills = AllDevelopmentIT.concat(AllCreativeDesign)
  .concat(AllSalesMarketing)
  .concat(AllWritingTranslation)
  .concat(AllAdminCustomer)
  .concat(AllFinanceAccounting)
  .concat(AllLegal)
  .concat(AllHRTraining)
  .concat(AllEngineerArchitecture)
  .concat(WritingSpecialty)
  .concat(WebMobileSoftwareSpecialty)
  .concat(TranslationSpecialty)
  .concat(SalesMarketingProjects)
  .concat(LegalSpecialty)
  .concat(ITNetworkingSpecialty)
  .concat(EngineeringArchitectureSpeciality)
  .concat(DesignCreativeSpecialy)
  .concat(DataScienceAnalyticsSpecialty)
  .concat(CustomerServiceSpecialty)
  .concat(AdminSupportSpecialty)
  .concat(AccountingConsultingSpecialty);

//Removing all duplicates
let AllSkills2 = [];
AllSkills.forEach((c) => {
  if (!AllSkills2.includes(c)) {
    AllSkills2.push(c);
  }
});

const AllSkillsDatalist = document.getElementById("allskills");

for (let i = 0; i < AllSkills2.length; i++) {
  var option = document.createElement("option");

  option.value = AllSkills2[i];

  AllSkillsDatalist.appendChild(option);
}

//END OF ARRAYS

const skillForm = document.getElementById("selectedSkills");
const enterSkill = document.getElementById("enterSkill");
//console.log(skillPill);

const nextScope = document.getElementById("nextScope");

const alertMsg = document.getElementById("alertMsg");

var input = document.getElementById("skills");

// array to hold all skills
const skillArray = [];

const specialtyContainer = document.querySelector(
  ".CategorySpecialtyContainer"
);

const SpecialtyUL1 = document.createElement("ul");
SpecialtyUL1.classList.add("SkillsUnderCategory");

const SpecialtyUL2 = document.createElement("ul");
SpecialtyUL2.classList.add("SkillsUnderCategory");

const SpecialtyUL3 = document.createElement("ul");
SpecialtyUL3.classList.add("SkillsUnderCategory");

const SpecialtyUL4 = document.createElement("ul");
SpecialtyUL4.classList.add("SkillsUnderCategory");

const SpecialtyUL5 = document.createElement("ul");
SpecialtyUL5.classList.add("SkillsUnderCategory");

const SpecialtyUL6 = document.createElement("ul");
SpecialtyUL6.classList.add("SkillsUnderCategory");

const SpecialtyUL7 = document.createElement("ul");
SpecialtyUL7.classList.add("SkillsUnderCategory");

const SpecialtyUL8 = document.createElement("ul");
SpecialtyUL8.classList.add("SkillsUnderCategory");

const SpecialtyUL9 = document.createElement("ul");
SpecialtyUL9.classList.add("SkillsUnderCategory");

const SpecialtyUL10 = document.createElement("ul");
SpecialtyUL10.classList.add("SkillsUnderCategory");

const SpecialtyUL11 = document.createElement("ul");
SpecialtyUL11.classList.add("SkillsUnderCategory");

const SpecialtyUL12 = document.createElement("ul");
SpecialtyUL12.classList.add("SkillsUnderCategory");

// ACCOUNTING AND CONSULTING
for (let i = 0; i < AccountingConsultingSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = AccountingConsultingSpecialty[i];
  skillPill.setAttribute("id", "skillPill1");

  SpecialtyUL1.appendChild(skillPill);
  SpecialtyUL1.setAttribute("id", "UL1");

  specialtyContainer.appendChild(SpecialtyUL1);
}
document.querySelectorAll("#skillPill1").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL1.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL1.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// ACCOUNTING AND CONSULTING ENDS

// ADMIN SUPPORT
for (let i = 0; i < AdminSupportSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = AdminSupportSpecialty[i];
  skillPill.setAttribute("id", "skillPill2");

  SpecialtyUL2.appendChild(skillPill);
  SpecialtyUL2.setAttribute("id", "UL2");

  specialtyContainer.appendChild(SpecialtyUL2);
}
document.querySelectorAll("#skillPill2").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);

    SpecialtyUL2.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL2.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// ADMIN SUPPORT ENDS

// CUSTOMER SERVICE SPECIALTY
for (let i = 0; i < CustomerServiceSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = CustomerServiceSpecialty[i];

  skillPill.setAttribute("id", "skillPill3");

  SpecialtyUL3.appendChild(skillPill);
  SpecialtyUL3.setAttribute("id", "UL3");

  specialtyContainer.appendChild(SpecialtyUL3);
}
document.querySelectorAll("#skillPill3").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL3.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL3.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// CUSTOMER SERVICE ENDS

// DATA SCIENCE AND ANALYTICS SECTION
for (let i = 0; i < DataScienceAnalyticsSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = DataScienceAnalyticsSpecialty[i];
  skillPill.setAttribute("id", "skillPill4");

  SpecialtyUL4.appendChild(skillPill);
  SpecialtyUL4.setAttribute("id", "UL4");

  specialtyContainer.appendChild(SpecialtyUL4);
}
document.querySelectorAll("#skillPill4").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL4.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL4.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// DATA SCIENCE AND ANALYTICS SECTIONS ENDS

// DESIGN AND CREATIVE SECTION
for (let i = 0; i < DesignCreativeSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = DesignCreativeSpecialty[i];
  skillPill.setAttribute("id", "skillPill5");

  SpecialtyUL5.appendChild(skillPill);
  SpecialtyUL5.setAttribute("id", "UL5");

  specialtyContainer.appendChild(SpecialtyUL5);
}
document.querySelectorAll("#skillPill5").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL5.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL5.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// DESIGN AND CREATIVE SECTION ENDS

//ENGINEERING ARCHITECTURE
for (let i = 0; i < EngineeringArchitectureSpeciality.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = EngineeringArchitectureSpeciality[i];
  skillPill.setAttribute("id", "skillPill6");

  SpecialtyUL6.appendChild(skillPill);
  SpecialtyUL6.setAttribute("id", "UL6");

  specialtyContainer.appendChild(SpecialtyUL6);
}
document.querySelectorAll("#skillPill6").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL6.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL6.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
//ENGINEERING ARCHITECTURE ENDS

// IT NETWORKING SECTIONS
for (let i = 0; i < ITNetworkingSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = ITNetworkingSpecialty[i];
  skillPill.setAttribute("id", "skillPill7");

  SpecialtyUL7.appendChild(skillPill);
  SpecialtyUL7.setAttribute("id", "UL7");

  specialtyContainer.appendChild(SpecialtyUL7);
}
document.querySelectorAll("#skillPill7").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL7.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL7.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// IT NETWORKING SECTION ENDS

//"Legal Section
for (let i = 0; i < LegalSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = LegalSpecialty[i];
  skillPill.setAttribute("id", "skillPill8");

  SpecialtyUL8.appendChild(skillPill);
  SpecialtyUL8.setAttribute("id", "UL8");

  specialtyContainer.appendChild(SpecialtyUL8);
}
document.querySelectorAll("#skillPill8").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL8.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL8.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
//Legal Section Ends

//"Sales & Marketing Section
for (let i = 0; i < SalesMarketingSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = SalesMarketingSpecialty[i];
  skillPill.setAttribute("id", "skillPill9");

  SpecialtyUL9.appendChild(skillPill);
  SpecialtyUL9.setAttribute("id", "UL9");

  specialtyContainer.appendChild(SpecialtyUL9);
}
document.querySelectorAll("#skillPill9").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL9.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL9.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
// Sales and marketing section ends

//"Translation Section
for (let i = 0; i < TranslationSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = TranslationSpecialty[i];
  skillPill.setAttribute("id", "skillPill10");

  SpecialtyUL10.appendChild(skillPill);
  SpecialtyUL10.setAttribute("id", "UL10");

  specialtyContainer.appendChild(SpecialtyUL10);
}
document.querySelectorAll("#skillPill10").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL10.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);
    //console.log(skillArray);
    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL10.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
//"Translation Section ENDS

//"Web, Mobile & Software Dev Section
for (let i = 0; i < WebMobileSoftwareSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = WebMobileSoftwareSpecialty[i];
  skillPill.setAttribute("id", "skillPill11");

  SpecialtyUL11.appendChild(skillPill);
  SpecialtyUL11.setAttribute("id", "UL11");

  specialtyContainer.appendChild(SpecialtyUL11);
}
document.querySelectorAll("#skillPill11").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL11.removeChild(item);

    var skillPill = document.createElement("label");

    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);

    //console.log(skillArray);

    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL11.appendChild(item);
        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
//Web, Mobile & Software Dev Section Ends

//"Writing Section
for (let i = 0; i < WritingSpecialty.length; i++) {
  var skillPill = document.createElement("li");
  skillPill.innerHTML = WritingSpecialty[i];
  skillPill.setAttribute("id", "skillPill12");

  SpecialtyUL12.appendChild(skillPill);
  SpecialtyUL12.setAttribute("id", "UL12");

  specialtyContainer.appendChild(SpecialtyUL12);
}
document.querySelectorAll("#skillPill12").forEach((item) => {
  item.addEventListener("click", () => {
    //handle click
    //console.log(item.innerText);
    SpecialtyUL12.removeChild(item);

    var skillPill = document.createElement("label");
    skillPill.innerHTML = item.innerText;

    skillArray.push(item.innerText);

    skillForm.appendChild(skillPill);

    //console.log(skillArray);

    alertMsg.innerText = "(Press on skill to remove)";

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);

        skillArray.pop(skillPill.innerHTML);

        SpecialtyUL12.appendChild(item);

        //console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  });
});
//"Writing Section Ends

//Span to update when user click on a dropdown category
var selectedCategorySpan = document.getElementById("selectedCategory");

SpecialtyUL1.style.display = "flex";
SpecialtyUL2.style.display = "none";
SpecialtyUL3.style.display = "none";
SpecialtyUL4.style.display = "none";
SpecialtyUL5.style.display = "none";
SpecialtyUL6.style.display = "none";
SpecialtyUL7.style.display = "none";
SpecialtyUL8.style.display = "none";
SpecialtyUL9.style.display = "none";
SpecialtyUL10.style.display = "none";
SpecialtyUL11.style.display = "none";
SpecialtyUL12.style.display = "none";

const e = document.getElementById("categoryID");
e.addEventListener("input", () => {
  var value = e.options[e.selectedIndex].value;
  var text = e.options[e.selectedIndex].text;
  selectedCategorySpan.innerText =
    document.getElementById("categoryID").selectedOptions[0].text;

  if (selectedCategorySpan.innerText.localeCompare("Writing") === 0) {
    SpecialtyUL1.style.display = "none";
    SpecialtyUL12.style.display = "flex";
  } else {
    SpecialtyUL12.style.display = "none";
  }
  if (
    selectedCategorySpan.innerText.localeCompare(
      "Web, Mobile & Software Dev"
    ) === 0
  ) {
    SpecialtyUL11.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL11.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Admin Support") === 0) {
    SpecialtyUL2.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL2.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Customer Service") === 0) {
    SpecialtyUL3.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL3.style.display = "none";
  }

  if (
    selectedCategorySpan.innerText.localeCompare("Data Science & Analytics") ===
    0
  ) {
    SpecialtyUL4.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL4.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Design & Creative") === 0) {
    SpecialtyUL5.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL5.style.display = "none";
  }

  if (
    selectedCategorySpan.innerText.localeCompare(
      "Engineering & Architecture"
    ) === 0
  ) {
    SpecialtyUL6.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL6.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("IT & Networking") === 0) {
    SpecialtyUL7.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL7.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Legal") === 0) {
    SpecialtyUL8.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL8.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Sales & Marketing") === 0) {
    SpecialtyUL9.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL9.style.display = "none";
  }

  if (selectedCategorySpan.innerText.localeCompare("Translation") === 0) {
    SpecialtyUL10.style.display = "flex";
    SpecialtyUL1.style.display = "none";
  } else {
    SpecialtyUL10.style.display = "none";
  }

  if (
    selectedCategorySpan.innerText.localeCompare("Accounting & Consulting") ===
    0
  ) {
    SpecialtyUL1.style.display = "flex";
  } else {
    SpecialtyUL1.style.display = "none";
  }
});

const SelectedSkillTitle = document.getElementById("SelectedSkillTitle");
const selectedSkillsForm = document.getElementById("selectedSkills");
const emptyError = document.getElementById("emptyError");

enterSkill.addEventListener("click", () => {
  if (input.value === "") {
    emptyError.innerText = "Please enter a skill.";
  } else if (skillArray.includes(input.value) === true) {
    // Ensure duplicates are not entered
    emptyError.innerText = "Already added!";
    //console.log("leo");
  } else {
    var skillPill = document.createElement("label");
    //console.log(input.value);
    skillPill.innerHTML = input.value;
    skillArray.push(input.value);

    skillForm.appendChild(skillPill);
    alertMsg.innerText = "(Press on skill to remove)";

    //console.log(skillArray);

    if (skillArray.length > 0) {
      skillPill.addEventListener("click", () => {
        skillForm.removeChild(skillPill);
        skillArray.pop(skillPill.innerHTML);
        console.log(skillArray);
      });
      nextScope.style.background = "#054e97";
      nextScope.style.color = "white";
      nextScope.style.cursor = "pointer";
      nextScope.style.pointerEvents = "visible";
    } else if ((skillArray.length = 0)) {
      nextScope.style.background = "lightgrey";
      nextScope.style.color = "grey";
      nextScope.style.pointerEvents = "none";
      nextScope.style.cursor = "notallowed";
    }
  } // Ends if statment checking if user input is empty
});

const EmptyArrayError = document.getElementById("EmptyArrayError");

nextScope.addEventListener("click", () => {
  if (skillArray.length > 0) {
    nextScope.style.background = "#054e97";
    nextScope.style.color = "white";
    nextScope.style.cursor = "pointer";
    nextScope.style.pointerEvents = "visible";

    localStorage.setItem(
      "category",
      document.getElementById("categoryID").selectedOptions[0].text
    );
    localStorage.setItem("skills", JSON.stringify(skillArray));

    window.location.href = "./postScope.html";
  } else {
    nextScope.style.background = "lightgrey";
    nextScope.style.color = "grey";
    nextScope.style.pointerEvents = "none";
    nextScope.style.cursor = "notallowed";
    EmptyArrayError.innerText = "Please add a skill or skills.";
  }
});
