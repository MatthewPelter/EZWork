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

//END OF ARRAYS

const currentTitle = localStorage.getItem("Job_Title");

const reviewJobTitle = (document.getElementById("currentTitleSpan").innerText =
  currentTitle);

const confirmTitle = document.getElementById("confirmTitle");
confirmTitle.addEventListener("click", () => {
  var ctSpan = document.getElementById("currentTitleSpan");
  //console.log(ctSpan.innerText);
  localStorage.setItem("Job_Title", ctSpan.innerText);
});

const currentCategory = localStorage.getItem("category");
const selectedCategory = (document.getElementById(
  "selectedCategory"
).innerText = currentCategory);

const currentScopeSize = localStorage.getItem("projectSize");
const currentScopeTime = localStorage.getItem("TimeScope");
const currentScopeExperience = localStorage.getItem("Experience");

const selectedScope = (document.getElementById("selectedScope").innerText =
  currentScopeSize
    .concat(" Size , ")
    .concat(currentScopeTime)
    .concat(", & ")
    .concat(currentScopeExperience)
    .concat(" experience."));

const currentBudget = JSON.parse(localStorage.getItem("budget"));
const selectedBudget = document.getElementById("selectedBudget");

if (currentBudget.length == 1) {
  selectedBudget.innerText = "$".concat(JSON.parse(currentBudget));
} else {
  selectedBudget.innerText = "$"
    .concat(currentBudget[0])
    .concat("-")
    .concat("$".concat(currentBudget[1]))
    .concat(" /hr");
}

const currentLocation = localStorage.getItem("locations");
const selectedLocation = document.getElementById("selectedLocation");
selectedLocation.innerText = JSON.parse(currentLocation);

const currentSkills = localStorage.getItem("skills");
const selectedSkills = document.getElementById("selectedSkills");
selectedSkills.innerText = JSON.parse(currentSkills);

// Button cards
const backBtn = document.getElementById("back");
backBtn.addEventListener("click", () => {
  // Go to back a page
  window.location.href = "./PostBudget.html";
});
const cancelBtn = document.getElementById("cancel");
cancelBtn.addEventListener("click", () => {
  // Cancel the job
  window.location.href = "../ClientProfile/index.html";
});

//Require a job description
const jobDescription = document.getElementById("jobDescription");

const descriptionError = document.getElementById("descriptionError");

function countWords(str) {
  return str.trim().split(/\s+/).length;
}

const postJob = document.getElementById("postJob");
const wordCountDescription = document.getElementById("wordCount");
jobDescription.addEventListener("input", () => {
  var jobDescriptionLength = countWords(jobDescription.value);
  wordCountDescription.innerHTML = jobDescriptionLength;
  postJob.style.background = "#054e97";
  postJob.style.color = "white";
  postJob.style.cursor = "pointer";
  postJob.style.pointerEvents = "visible";

  if (jobDescriptionLength < 15) {
    descriptionError.style.display = "block";
  } else if (jobDescriptionLength > 5000) {
    descriptionError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The maximum word count is 5000."
      );
  } else {
    descriptionError.style.display = "none";
  }
});

postJob.addEventListener("click", () => {
  var jobDescriptionLength = countWords(jobDescription.value);
  if (jobDescriptionLength < 15) {
    descriptionError.style.display = "block";
  } else if (jobDescriptionLength > 5000) {
    descriptionError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The maximum word count is 5000."
      );
  } else {
    localStorage.setItem("jobDescription", jobDescription.value);
    window.location.href = "../ClientProfile/index.html";
  }
});

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

const dataScienceAnalyticsDatalist = document.getElementById(
  "allDataScienceAnalyticsSpecialty"
);

for (let i = 0; i < DataScienceAnalyticsSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = DataScienceAnalyticsSpecialty[i];

  dataScienceAnalyticsDatalist.appendChild(option);
}

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

const WritingSpecialtyDatalist = document.getElementById("allWritingSpecialty");

for (let i = 0; i < WritingSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = WritingSpecialty[i];

  WritingSpecialtyDatalist.appendChild(option);
}

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
const webMobileDevDatalist = document.getElementById(
  "allWebMobileDevSpecialty"
);

for (let i = 0; i < WebMobileSoftwareSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = WebMobileSoftwareSpecialty[i];

  webMobileDevDatalist.appendChild(option);
}

//"Translation"
const TranslationSpecialty = [
  "Legal Translation",
  "Technical Translation",
  "Language Tutoring",
  "Translation",
  "Language Localization",
  "Medical Translation",
];

const translationDatalist = document.getElementById("allTranslationSpecialty");

for (let i = 0; i < TranslationSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = TranslationSpecialty[i];

  translationDatalist.appendChild(option);
}

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

const salesMarketingDatalist = document.getElementById(
  "allSalesMarketingSpecialty"
);

for (let i = 0; i < SalesMarketingSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = SalesMarketingSpecialty[i];

  salesMarketingDatalist.appendChild(option);
}

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

const legalDatalist = document.getElementById("allLegalSpecialty");

for (let i = 0; i < LegalSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = LegalSpecialty[i];

  legalDatalist.appendChild(option);
}

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
const itNetworkDatalist = document.getElementById("allItNetworkSpecialty");

for (let i = 0; i < ITNetworkingSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = ITNetworkingSpecialty[i];

  itNetworkDatalist.appendChild(option);
}

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

const engineeringArchitectureDatalist = document.getElementById(
  "allEngineeringArchitectureSpecialty"
);

for (let i = 0; i < EngineeringArchitectureSpeciality.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = EngineeringArchitectureSpeciality[i];

  engineeringArchitectureDatalist.appendChild(option);
}

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

const accoutingConsultingDatalist = document.getElementById(
  "allAccoutingConsultingSpecialty"
);

for (let i = 0; i < AccountingConsultingSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = AccountingConsultingSpecialty[i];

  accoutingConsultingDatalist.appendChild(option);
}

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

const designCreativeDatalist = document.getElementById(
  "allDesignCreativeSpecialty"
);

for (let i = 0; i < DesignCreativeSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = DesignCreativeSpecialty[i];

  designCreativeDatalist.appendChild(option);
}

//"Admin Support"
const AdminSupportSpecialty = [
  "Virtual/Administrative Assistance",
  "Data Entry",
  "Project Management",
  "Transcription",
  "Order Processing",
  "Online Research",
];

const adminSupportDatalist = document.getElementById(
  "allAdminSupportSpecialty"
);

for (let i = 0; i < AdminSupportSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = AdminSupportSpecialty[i];

  adminSupportDatalist.appendChild(option);
}

//"Customer Service"
const CustomerServiceSpecialty = ["Customer Service", "Tech Support "];

const customerServiceDatalist = document.getElementById(
  "allCustomerServiceSpecialty"
);

for (let i = 0; i < CustomerServiceSpecialty.length; i++) {
  var option = document.createElement("option");

  //option.value = WritingSpecialty[i];
  option.innerText = CustomerServiceSpecialty[i];

  customerServiceDatalist.appendChild(option);
}

// Datalist js
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

// Adding functionality to the edit category
const categorySelect = document.getElementById("categoryID");

// Get all specialty cards
const accoutingConsultingSpecialtyCard = document.querySelector(
  ".accoutingConsultingSpecialtyCard"
);
const adminSupportSpecialtyCard = document.querySelector(
  ".adminSupportSpecialtyCard"
);
const customerServiceSpecialtyCard = document.querySelector(
  ".customerServiceSpecialtyCard"
);
const dataScienceAnalyticsSpecialtyCard = document.querySelector(
  ".dataScienceAnalyticsSpecialtyCard"
);
const designCreativeSpecialtyCard = document.querySelector(
  ".designCreativeSpecialtyCard"
);
const engineeringArchitectureSpecialtyCard = document.querySelector(
  ".engineeringArchitectureSpecialtyCard"
);
const itNetworkSpecialtyCard = document.querySelector(
  ".itNetworkSpecialtyCard"
);
const legalSpecialtyCard = document.querySelector(".legalSpecialtyCard");

const salesMarketingSpecialtyCard = document.querySelector(
  ".salesMarketingSpecialtyCard"
);
const translationSpecialtyCard = document.querySelector(
  ".translationSpecialtyCard"
);
const webMobileDevSpecialtyCard = document.querySelector(
  ".webMobileDevSpecialtyCard"
);
const writingSpecialtyCard = document.querySelector(".writingSpecialtyCard");

const e = document.getElementById("categoryID");
e.addEventListener("input", () => {
  var value = e.options[e.selectedIndex].value;
  var text = e.options[e.selectedIndex].text;

  //console.log(text);

  if (text == "Accounting & Consulting") {
    accoutingConsultingSpecialtyCard.style.display = "inline-block";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Admin Support") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "inline-block";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Customer Service") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "inline-block";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Data Science & Analytics") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "inline-block";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Design & Creative") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "inline-block";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Engineering & Architecture") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "inline-block";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "IT & Networking") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "inline-block";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Legal") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "inline-block";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Sales & Marketing") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "inline-block";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Translation") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "inline-block";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Web, Mobile & Software Dev") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "inline-block";
    writingSpecialtyCard.style.display = "none";
  } else if (text == "Writing") {
    accoutingConsultingSpecialtyCard.style.display = "none";
    adminSupportSpecialtyCard.style.display = "none";
    customerServiceSpecialtyCard.style.display = "none";
    dataScienceAnalyticsSpecialtyCard.style.display = "none";
    designCreativeSpecialtyCard.style.display = "none";
    engineeringArchitectureSpecialtyCard.style.display = "none";
    itNetworkSpecialtyCard.style.display = "none";
    legalSpecialtyCard.style.display = "none";
    salesMarketingSpecialtyCard.style.display = "none";
    translationSpecialtyCard.style.display = "none";
    webMobileDevSpecialtyCard.style.display = "none";
    writingSpecialtyCard.style.display = "inline-block";
  }
});

const currentCategorySpan = document.getElementById("currentCategory");
currentCategorySpan.innerText = localStorage.getItem("category");

const a = document.getElementById("allAccoutingConsultingSpecialty");
a.addEventListener("input", () => {
  var value = a.options[a.selectedIndex].value;
  var text = a.options[a.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const b = document.getElementById("allAdminSupportSpecialty");
b.addEventListener("input", () => {
  var value = b.options[b.selectedIndex].value;
  var text = b.options[b.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const c = document.getElementById("allCustomerServiceSpecialty");
c.addEventListener("input", () => {
  var value = c.options[c.selectedIndex].value;
  var text = c.options[c.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const d = document.getElementById("allDataScienceAnalyticsSpecialty");
d.addEventListener("input", () => {
  var value = d.options[d.selectedIndex].value;
  var text = d.options[d.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const f = document.getElementById("allDataScienceAnalyticsSpecialty");
f.addEventListener("input", () => {
  var value = f.options[f.selectedIndex].value;
  var text = f.options[f.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const g = document.getElementById("allDesignCreativeSpecialty");
g.addEventListener("input", () => {
  var value = g.options[g.selectedIndex].value;
  var text = g.options[g.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const h = document.getElementById("allEngineeringArchitectureSpecialty");
h.addEventListener("input", () => {
  var value = h.options[h.selectedIndex].value;
  var text = h.options[h.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const i = document.getElementById("allItNetworkSpecialty");
i.addEventListener("input", () => {
  var value = i.options[i.selectedIndex].value;
  var text = i.options[i.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const j = document.getElementById("allLegalSpecialty");
j.addEventListener("input", () => {
  var value = j.options[j.selectedIndex].value;
  var text = j.options[j.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const k = document.getElementById("allSalesMarketingSpecialty");
k.addEventListener("input", () => {
  var value = k.options[k.selectedIndex].value;
  var text = k.options[k.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const l = document.getElementById("allTranslationSpecialty");
l.addEventListener("input", () => {
  var value = l.options[l.selectedIndex].value;
  var text = l.options[l.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const m = document.getElementById("allWebMobileDevSpecialty");
m.addEventListener("input", () => {
  var value = m.options[m.selectedIndex].value;
  var text = m.options[m.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});
const n = document.getElementById("allWritingSpecialty");
n.addEventListener("input", () => {
  var value = n.options[n.selectedIndex].value;
  var text = n.options[n.selectedIndex].text;
  currentCategorySpan.innerText = text;

  localStorage.setItem("category", text);
});

const closeEditCategoryCard = document.getElementById("settingsOverlay");
const applyEdit = document.getElementById("applyEdit");
applyEdit.addEventListener("click", () => {
  closeEditCategoryCard.style.display = "none";
  const selectedCategory = (document.getElementById(
    "selectedCategory"
  ).innerText = localStorage.getItem("category"));
});

//Review Skill
const skillForm = document.getElementById("selectedSkillsForm");
const enterSkill = document.getElementById("enterSkill");
var input = document.getElementById("skills");
// array to hold all skills
const skillArray = [];

const skillsBTN = document.getElementById("skillsBTN");
const tempSkills = JSON.parse(localStorage.getItem("skills"));

//console.log(tempSkills[0]);

//console.log(tempSkills.length);
alertMsg.innerText = "(Press on skill to remove)";
const applySkillEdit = document.getElementById("applySkillEdit");
for (let i = 0; i < tempSkills.length; i++) {
  var skillPill = document.createElement("label");
  skillPill.innerHTML = tempSkills[i];

  skillForm.appendChild(skillPill);

  skillArray.push(skillPill.innerText);
  // console.log(skillArray);

  if (skillArray.length > 0) {
    skillPill.addEventListener("click", () => {
      //console.log("leo");
      //skillPill.remove();
      skillForm.removeChild(skillPill);
      skillArray.pop(skillPill.innerHTML);
    });
  }
  i++;
}

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
        //console.log(skillArray);
      });
    }
  } // Ends if statment checking if user input is empty
});

const skillsOverlay = document.querySelector(".skillsOverlay");
applySkillEdit.addEventListener("click", () => {
  if (skillArray.length > 0) {
    localStorage.setItem("skills", JSON.stringify(skillArray));
    skillsOverlay.style.display = "none";

    var userSelectedSkills = localStorage.getItem("skills");
    selectedSkills.innerText = JSON.parse(userSelectedSkills);
  } else if (skillArray == 0) {
    emptyError.innerText = "Please add one skill.";
  }
});

// Review Scope
// Post Scope Start
const EditFreelanceExperience = document.getElementById(
  "freelance-experience-edit"
);

const CurrentExperienceCard = document.querySelector(".freelance-experience");

const ExperienceCard = document.querySelector(".freelance-experience-options");

EditFreelanceExperience.addEventListener("click", () => {
  ExperienceCard.style.display = "inline-block";
  CurrentExperienceCard.style.display = "none";
});
const entryOption = document.querySelector(".entry-option");

const intermediateOption = document.querySelector(".intermediate-option");

const expertOption = document.querySelector(".expert-option");

const entryBtn = document.getElementById("entry-button");
const intermediateBtn = document.getElementById("intermediate-button");
const expertBtn = document.getElementById("expert-button");

const CurrentExperienceChoice = document.getElementById(
  "currentExperienceChoice"
);

// Holds the user choice
var experience = "Entry Level";

entryOption.addEventListener("click", () => {
  entryBtn.style.color = "#054e97";
  intermediateBtn.style.color = "transparent";
  expertBtn.style.color = "transparent";

  experience = "Entry Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});
intermediateOption.addEventListener("click", () => {
  entryBtn.style.color = "transparent";
  intermediateBtn.style.color = "#054e97";
  expertBtn.style.color = "transparent";

  experience = "Intermediate Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});
expertOption.addEventListener("click", () => {
  entryBtn.style.color = "transparent";
  intermediateBtn.style.color = "transparent";
  expertBtn.style.color = "#054e97";

  experience = "Expert Level";

  CurrentExperienceChoice.innerText = experience;

  ExperienceCard.style.display = "none";
  CurrentExperienceCard.style.display = "flex";
});

// Scope Experience JS Ends

//Scope Time Start
const EditProjectTime = document.getElementById("project-time-edit");

const CurrentTimeCard = document.querySelector(".project-time");

const TimeCard = document.querySelector(".project-time-options");

EditProjectTime.addEventListener("click", () => {
  TimeCard.style.display = "inline-block";
  CurrentTimeCard.style.display = "none";
});

const threeToSixMonthsOption = document.querySelector(".threeToSixMonths");

const oneToThreeMonthsOption = document.querySelector(".oneToThreeMonths");

const lessThanOneMonthOption = document.querySelector(".lessThanOneMonth");

const threeToSixMonthsBtn = document.getElementById("threeToSixMonths-button");
const oneToThreeMonthsBtn = document.getElementById("oneToThreeMonths-button");
const lessThanOneMonthBtn = document.getElementById("lessThanOneMonth-button");

// Holds the user time choice
var timeChoice = "Less than 1 month";
const CurrentTimeChoice = document.getElementById("currentTimeChoice");

threeToSixMonthsOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "#054e97";
  oneToThreeMonthsBtn.style.color = "transparent";
  lessThanOneMonthBtn.style.color = "transparent";

  timeChoice = "3 to 6 months";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

oneToThreeMonthsOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "transparent";
  oneToThreeMonthsBtn.style.color = "#054e97";
  lessThanOneMonthBtn.style.color = "transparent";

  timeChoice = "1 to 3 months";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

lessThanOneMonthOption.addEventListener("click", () => {
  threeToSixMonthsBtn.style.color = "transparent";
  oneToThreeMonthsBtn.style.color = "transparent";
  lessThanOneMonthBtn.style.color = "#054e97";

  timeChoice = "Less than 1 month";

  CurrentTimeChoice.innerText = timeChoice;

  TimeCard.style.display = "none";
  CurrentTimeCard.style.display = "flex";
});

// Project Size JS
const EditProjectSize = document.getElementById("project-size-edit");

const CurrentSizeCard = document.querySelector(".project-size-container");

const SizeCard = document.querySelector(".project-size-options");

EditProjectSize.addEventListener("click", () => {
  SizeCard.style.display = "inline-block";
  CurrentSizeCard.style.display = "none";
});

const largeSizeOption = document.querySelector(".large-option");

const mediumSizeOption = document.querySelector(".medium-option");

const smallSizeOption = document.querySelector(".small-option");

const largeSizeBtn = document.getElementById("largeSize-button");
const mediumSizeBtn = document.getElementById("mediumSize-button");
const smallSizeBtn = document.getElementById("smallSize-button");

// Holds the user time choice
var sizeChoice = "Small";
const currentSizeChoice = document.getElementById("currentSizeChoice");
const SizeDescription = document.getElementById("SizeDescription");

largeSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "#054e97";
  mediumSizeBtn.style.color = "transparent";
  smallSizeBtn.style.color = "transparent";

  sizeChoice = "Large";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText =
    "Longer term or complex initiatives (ex. design and build a full website)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

mediumSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "transparent";
  mediumSizeBtn.style.color = "#054e97";
  smallSizeBtn.style.color = "transparent";

  sizeChoice = "Medium";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText = "Well-defined projects (ex. a landing page)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

smallSizeOption.addEventListener("click", () => {
  largeSizeBtn.style.color = "transparent";
  mediumSizeBtn.style.color = "transparent";
  smallSizeBtn.style.color = "#054e97";

  sizeChoice = "Small";

  currentSizeChoice.innerText = sizeChoice;

  SizeDescription.innerText =
    "Quick and straightforward tasks (ex. update text and images on a webpage)";

  SizeCard.style.display = "none";
  CurrentSizeCard.style.display = "flex";
});

// Project size JS ends

const closeEditScopeCard = document.getElementById("scopeOverlay");

const applyScopeEdit = document.getElementById("applyScopeEdit");
applyScopeEdit.addEventListener("click", () => {
  closeEditScopeCard.style.display = "none";
  localStorage.setItem("projectSize", sizeChoice);
  localStorage.setItem("TimeScope", timeChoice);
  localStorage.setItem("Experience", experience);

  const currentScopeSize = localStorage.getItem("projectSize");
  const currentScopeTime = localStorage.getItem("TimeScope");
  const currentScopeExperience = localStorage.getItem("Experience");

  var selectedScope = (document.getElementById("selectedScope").innerText =
    currentScopeSize
      .concat(" Size , ")
      .concat(currentScopeTime)
      .concat(", & ")
      .concat(currentScopeExperience)
      .concat(" experience."));
});

//Review Location
const usOnlyCard = document.getElementById("usOnly");
const worldwideCard = document.getElementById("worldwide");

//Buttons for cards
const worldwideBtn = document.getElementById("worlwide-button");
const usOnlyBtn = document.getElementById("usOnly-button");

// Us locations And worldwide locations
const usOnlyLocations = document.querySelector(".usOnlyCard");
const worldwideLocations = document.querySelector(".worldwideCard");

const allLocations = [];
worldwideCard.addEventListener("click", () => {
  worldwideCard.style.border = "1.25px solid #054e97";
  worldwideBtn.style.color = "#054e97";
  worldwideBtn.style.border = "1.25px solid #054e97";

  usOnlyCard.style.border = "1.25px solid lightgrey";
  usOnlyBtn.style.color = "transparent";
  usOnlyBtn.style.border = "1.25px solid lightgrey";

  worldwideLocations.style.display = "inline-block";
  usOnlyLocations.style.display = "none";

  //Ensure the us data is clear
  //allLocations.splice(0, allLocations.length);
  selectedLocationsContainer.style.display = "none";
  selectedLocationsCard.style.display = "none";
});
usOnlyCard.addEventListener("click", () => {
  usOnlyCard.style.border = "1.25px solid #054e97";
  usOnlyBtn.style.color = "#054e97";
  usOnlyBtn.style.border = "1.25px solid #054e97";

  worldwideCard.style.border = "1.25px solid lightgrey";
  worldwideBtn.style.color = "transparent";
  worldwideBtn.style.border = "1.25px solid lightgrey";

  usOnlyLocations.style.display = "inline-block";
  worldwideLocations.style.display = "none";

  //Ensure the worldwide data is clear
  //allLocations.splice(0, allLocations.length);
  selectedLocationsContainer2.style.display = "none";
  selectedLocationsCard2.style.display = "none";
});

const tmz = document.getElementById("TimeZones&StatesID");
const sr = document.getElementById("States&RegionsID");

const addBtn1 = document.getElementById("add1");
const addBtn2 = document.getElementById("add2");

const selectedLocationsCard = document.querySelector(
  ".selectedLocationsUSCard"
);
const selectedLocationsContainer = document.querySelector(
  ".selectedLocationsUS"
);

const selectedLocationsCard2 = document.querySelector(
  ".selectedLocationsWorldwideCard"
);
const selectedLocationsContainer2 = document.querySelector(
  ".selectedLocationsWorldwide"
);

const emptyError = document.getElementById("emptyError");

addBtn1.addEventListener("click", () => {
  if (tmz.value === "") {
    emptyError.innerText = "No input.";
  } else if (allLocations.includes(tmz.value) === true) {
    // Ensure duplicates are not entered
    emptyError.innerText = "Already added!";
    //console.log("leo");
  } else {
    selectedLocationsCard2.style.display = "none";
    selectedLocationsContainer2.style.display = "none";

    selectedLocationsContainer.style.display = "inline-block";
    //console.log(e.value);
    var locationPill = document.createElement("label");
    locationPill.innerHTML = tmz.value;

    allLocations.push(tmz.value);

    selectedLocationsCard.style.display = "inline-block";
    selectedLocationsContainer.style.display = "inline-block";
    selectedLocationsContainer.appendChild(locationPill);

    //console.log(allLocations);

    if (allLocations.length > 0) {
      locationPill.addEventListener("click", () => {
        selectedLocationsContainer.removeChild(locationPill);
        allLocations.pop(locationPill.innerHTML);
        //console.log(allLocations);
      });
    } else if ((allLocations.length = 0)) {
    }
  }
});

addBtn2.addEventListener("click", () => {
  if (sr.value === "") {
    emptyError.innerText = "No input.";
  } else if (allLocations.includes(sr.value) === true) {
    // Ensure duplicates are not entered
    emptyError.innerText = "Already added!";
    //console.log("leo");
  } else {
    selectedLocationsCard.style.display = "none";
    selectedLocationsContainer.style.display = "none";
    //console.log(a.value);
    var locationPill = document.createElement("label");
    locationPill.innerHTML = sr.value;

    allLocations.push(sr.value);

    selectedLocationsCard2.style.display = "inline-block";
    selectedLocationsContainer2.style.display = "inline-block";

    selectedLocationsContainer2.appendChild(locationPill);
    //console.log(allLocations);

    if (allLocations.length > 0) {
      locationPill.addEventListener("click", () => {
        selectedLocationsContainer2.removeChild(locationPill);
        allLocations.pop(locationPill.innerHTML);
        //console.log(allLocations);
      });
    } else if ((allLocations.length = 0)) {
    }
  }
});

const EmptyArrayError = document.getElementById("emptyArray");

const closeEditLocationCard = document.getElementById("locationOverlay");

const applyLocationEdit = document.getElementById("applyLocationEdit");
applyLocationEdit.addEventListener("click", () => {
  closeEditLocationCard.style.display = "none";

  localStorage.setItem("locations", JSON.stringify(allLocations));

  var currentLocation = localStorage.getItem("locations");
  var selectedLocation = document.getElementById("selectedLocation");
  selectedLocation.innerText = JSON.parse(currentLocation);
});

// Budget Edit

const hourlyCard = document.getElementById("hourlyCard");
const hourlyCardBtn = document.getElementById("hourlyCard-button");

const priceCard = document.getElementById("priceCard");
const priceCardBtn = document.getElementById("priceCard-button");

const budgetContainer = document.querySelector(".budgetContainer");
const hourlyContainer = document.querySelector(".hourlyContainer");

const setMaxBudget = document.getElementById("setMaxBudget");
const addMaxBudget = document.getElementById("addMaxBudget");

const alertBudget = document.getElementById("alertBudget");

const userBudget = document.getElementById("userBudget");
const OfficalBudget = document.getElementById("OfficalBudget");

// HOURLY CONTAINER js
const addMinHourlyBtn = document.getElementById("addMinHourly");
const addMaxHourlyBtn = document.getElementById("addMaxHourly");

const setMinHourly = document.getElementById("setMinHourly");
const setMaxHourly = document.getElementById("setMaxHourly");

const alertMinHourly = document.getElementById("alertMinHourly");
const officialMinRate = document.getElementById("officialMinRate");

const officialMaxRate = document.getElementById("officialMaxRate");
const MaxError = document.getElementById("MaxError");

//Array
const budget = [];
const hourlyPay = [];

var tempBudget = JSON.parse(localStorage.getItem("budget"));
//console.log(tempBudget);
if (tempBudget.length == 1) {
  //console.log("Budget");
  priceCard.style.border = "1.25px solid #054e97";
  priceCardBtn.style.color = "#054e97";
  priceCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  hourlyCard.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.color = " transparent";

  // Show budget card
  budgetContainer.style.display = "block";
  // Hide hourly card
  hourlyContainer.style.display = "none";

  userBudget.innerText = JSON.parse(localStorage.getItem("budget"));
  OfficalBudget.style.display = "flex";
} else {
  //console.log("Hourly");
  hourlyCard.style.border = "1.25px solid #054e97";
  hourlyCardBtn.style.color = "#054e97";
  hourlyCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  priceCard.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.color = " transparent";
  //show hourly Card
  hourlyContainer.style.display = "block";
  // Hide budget card
  budgetContainer.style.display = "none";

  officialMinRate.innerText = tempBudget[0];
  officialMaxRate.innerText = tempBudget[1];
}

hourlyCard.addEventListener("click", () => {
  hourlyCard.style.border = "1.25px solid #054e97";
  hourlyCardBtn.style.color = "#054e97";
  hourlyCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  priceCard.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.border = "1.25px solid rgb(121, 121, 121)";
  priceCardBtn.style.color = " transparent";
  //show hourly Card
  hourlyContainer.style.display = "block";
  // Hide budget card
  budgetContainer.style.display = "none";
});

priceCard.addEventListener("click", () => {
  priceCard.style.border = "1.25px solid #054e97";
  priceCardBtn.style.color = "#054e97";
  priceCardBtn.style.border = "1.25px solid #054e97";

  //Ensure other card is default
  hourlyCard.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.border = " 1.25px solid rgb(121, 121, 121)";
  hourlyCardBtn.style.color = " transparent";

  // Show budget card
  budgetContainer.style.display = "block";
  // Hide hourly card
  hourlyContainer.style.display = "none";
});

// Restricts input for the given textbox to the given inputFilter function.
function setInputFilter(textbox, inputFilter) {
  [
    "input",
    "keydown",
    "keyup",
    "mousedown",
    "mouseup",
    "select",
    "contextmenu",
    "drop",
  ].forEach(function (event) {
    textbox.addEventListener(event, function () {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
setInputFilter(document.getElementById("setMaxBudget"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("setMaxHourly"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("setMinHourly"), function (value) {
  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

addMaxBudget.addEventListener("click", () => {
  if (setMaxBudget.value < 5) {
    alertBudget.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Minimum budget is 5 US Dollars"
      );
  } else {
    alertBudget.innerHTML = "";
    userBudget.innerText = setMaxBudget.value;
    OfficalBudget.style.display = "flex";

    budget.length = 0;
    budget.push(setMaxBudget.value);
  }
});

addMinHourlyBtn.addEventListener("click", () => {
  if (setMinHourly.value < 3) {
    alertMinHourly.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "The minimum hourly rate on EZwork is $3."
      );
  } else {
    budget.length = 0;
    budget.push(setMinHourly.value);

    alertMinHourly.innerHTML = "";
    officialMinRate.innerText = setMinHourly.value;
  }
});

addMaxHourlyBtn.addEventListener("click", () => {
  if (setMaxHourly.value <= officialMinRate.innerText) {
    MaxError.innerHTML =
      `<i class="fa fa-exclamation-circle" aria-hidden="true"></i>`.concat(
        "Please enter a higher value than the minimum pay."
      );

    //block review button
  } else {
    budget.push(setMaxHourly.value);

    MaxError.innerHTML = "";
    officialMaxRate.innerText = setMaxHourly.value;
  }
});

const budgetOverlay = document.querySelector(".budgetOverlay");
const applyBudgetEdit = document.getElementById("applyBudgetEdit");

applyBudgetEdit.addEventListener("click", () => {
  localStorage.setItem("budget", JSON.stringify(budget));
  var testBudget = JSON.parse(localStorage.getItem("budget"));

  if (testBudget.length == 1) {
    selectedBudget.innerText = "";
    selectedBudget.innerText = "$".concat(JSON.parse(testBudget));
  } else {
    selectedBudget.innerText = "$"
      .concat(testBudget[0])
      .concat("-")
      .concat("$".concat(testBudget[1]))
      .concat(" /hr");
  }
  budgetOverlay.style.display = "none";
});
