<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pete's Little Lunch Box | Case Study</title>
    <link rel="icon" type="image/svg+xml" href="../images/flare-logos/favicon.png">
    <link rel="stylesheet" href="css/case-study.css">
    <link rel="stylesheet" href="../app/css/components.css">
</head>
<body>
    <div class="hero">
        <img src="images/hero.webp" alt="Pete's Little Lunch Box Application Screens">
    </div>
        
    <div class="case-study-container">
        <h1 class="case-title">pete's little lunch box</h1>
        <p class="case-study-details">
        SHANNON JAYA | ROLE: CODER & DESIGNER | TIME: 10 WEEKS <br>
        TOOLS: PHP, MYSQL, JAVASCRIPT, HTML, CSS, FIGMA, MICROSOFT TEAMS, CYBERDUCK, MAMP, GITHUB
        </p>
        <section class="case-section">
            <h2 class="case-subheading">overview</h2>

            <p class="case-text">This project focused on designing and developing a mobile-first web application that allows users to browse a Food Truck's menu, customize an order, checkout, and generate a receipt for pickup. The project was completed in User Experience Design II (IDM 216), where teams transformed earlier Figma prototypes into fully functioning web applications using a structured production pipeline.</p>

            <p class="case-text">Our team, Flare, built upon a mobile app concept for Pete's Little Lunch Box originally designed in User Experience Design I (IDM 215). The goal of IDM 216 was to convert that prototype into a working web application supported by a database and interactive functionality.</p>

            <p class="case-text">The main challenge was translating the prototype into a functional system while maintaining strong user experience principles. Our team coordinated design, development, database architecture, and usability testing in a fast-paced collaborative environment.</p>

            <p class="case-text">The final result was a responsive ordering experience supported by a structured database and interactive interface. Through two rounds of usability testing and iterative improvements, the application evolved into a clear ordering system that allows users to select menu items, customize options, calculate totals, and complete purchases. The project demonstrates how collaborative UX/UI workflows, structured project management, and iterative testing can transform early design concepts into functional digital products.</p>
        </section>

        <div class="imgs">
            <p>Main Application Screens</p>
            <img src="images/overview.webp" alt="Main Application Screens" class="case-image">
        </div>


        <section class="case-section">
            <h2 class="case-subheading">context and challenge</h2>

            <h3>Background</h3>

            <p class="case-text">This project was completed over a 10-week academic term in IDM 216, which focuses on converting Figma prototypes into fully functioning web applications. Our team followed a structured workflow that included planning, design development, coding, database integration, and usability testing.</p>

            <p class="case-text">Our team, Flare, consisted of four members with overlapping roles:</p>
            <ul>
                <li>Project Managers: workflow coordination and task management</li>
                <li>Designers: UX/UI design and usability testing</li>
                <li>Coders: front-end and back-end development</li>
                <li>Data Architects: project asset organization and data structure</li>
            </ul>

            <p class="case-text">Each member held both a primary and secondary role to support collaboration throughout the project.</p>

            <p class="case-text">My primary role was Coder, where I handled the frontend and backend development, implementing interactive features and database integration. My secondary role was Designer, where I contributed to UX/UI decisions, interface design, and visual consistency across the application.</p>

            <p class="case-text">The project progressed through several phases:</p>
            <ul>
                <li>Team formation and project setup</li>
                <li>Prototype refinement and planning</li>
                <li>Alpha development and usability testing</li>
                <li>Beta development and usability testing</li>
                <li>Final development and deployment</li>
            </ul>

            <p class="case-text">To support collaboration, we used Microsoft Teams for communication and task management and GitHub for version control. I managed the codebase, implemented version control workflows, and ensured consistent code quality throughout development.</p>

            <p class="case-text">Development began with a high-fidelity Figma prototype created in IDM 215, which defined the application's brand design, interface structure, navigation flow, and interaction patterns.</p>

            <div class="imgs">
                <p>Figma Prototype</p>
                <img src="images/figma_file.webp" alt="Figma Prototype" class="case-image">
            </div>

            <h3>The Problem</h3>

            <p class="case-text">The core challenge was transforming a Figma prototype into a fully functional ordering application while maintaining usability and clear interaction flows.</p>

            <p class="case-text">The application needed to:</p>
            <ul>
                <li>Allow users to browse menu items</li>
                <li>Provide customization options that affect price</li>
                <li>Guide users through the ordering process</li>
                <li>Calculate totals including tax</li>
                <li>Simulate checkout and payment</li>
                <li>Display a receipt for order pickup</li>
            </ul>

            <p class="case-text">Beyond the product itself, the technical implementation required complex JavaScript functionality for cart management, dynamic pricing calculations, and real-time updates. As the primary coder, I needed to architect a system that could handle multiple customization options while maintaining fast performance and intuitive user interactions.</p>

            <p class="case-text">Without proper code structure and responsive design implementation, the application could easily become slow, buggy, or difficult to use across different devices.</p>
            
            <p class="case-text">An additional challenge was coordinating development work across team members while maintaining code quality and preventing conflicts. Using GitHub for version control, I had to manage multiple feature branches and ensure that my functionality implementations integrated smoothly with other team members' contributions.</p>
            <div class="imgs">
                <p>GitHub Pull Requests & Collaborative Development</p>
                <img src="images/pull-requests.webp" alt="GitHub Pull Requests & Collaborative Development" class="case-image">
            </div>

            <h3>Goals & Objectives</h3>

            <p class="case-text">Our project established several key goals to guide development and measure success.</p>

            <p class="case-text">User Experience Goals</p>
            <ul>
                <li>Provide a clear and intuitive ordering flow</li>
                <li>Ensure menu selections and customization options are easy to understand</li>
                <li>Minimize user confusion during navigation and checkout</li>
            </ul>

            <p class="case-text">Technical Goals</p>
            <ul>
                <li>Build a responsive mobile-first web application</li>
                <li>Integrate menu data through structured database tables</li>
                <li>Implement ordering features including item selection and total calculation</li>
            </ul>

            <p class="case-text">Process Goals</p>
            <ul>
                <li>Maintain organized workflows through collaborative tools</li>
                <li>Track tasks and responsibilities throughout the project lifecycle</li>
                <li>Use usability testing feedback to improve the Alpha and Beta builds</li>
            </ul>

            <p class="case-text">Success was defined by delivering a fully functional web application that demonstrated both technical functionality and strong UX/UI design principles.</p>

        </section>

        <section class="case-section">
            <h2 class="case-subheading">process and insight</h2>

            <h3>Core Application Functionality</h3>

            <p class="case-text">As the primary coder, I focused on developing the core functionality that powers the ordering experience. This involved building the essential systems that allow users to interact with menu items and complete their orders.</p>

            <p class="case-text">Key functionality implementations included:</p>
            <ul>
                <li>Ordering system architecture and workflow</li>
                <li>Adding items to lunchbox with real-time updates</li>
                <li>Complex customization logic for menu items</li>
                <li>Order number generation and tracking system</li>
                <li>Cart persistence and state management</li>
            </ul>

            <p class="case-text">I developed the core ordering flow that allows users to select items, customize them with various options, and add them to their lunchbox. The system handles complex customization scenarios while maintaining accurate pricing calculations throughout the process.</p>
           
            <p class="case-text">A critical component was implementing the order number generation system, which creates unique identifiers for each completed order, enabling customers to track their purchases for pickup.</p>

            <div class="imgs">
                <p>Checkout Functionality</p>
                <img src="images/checkout-js.webp" alt="Checkout Functionality" class="case-image">
            </div>

            <h3>Static Prototypes & Key Page Design</h3>

            <p class="case-text">In my secondary role as Designer, I contributed to creating static prototypes for the most critical pages in the user journey, working alongside our team's primary frontend developer.</p>

            <p class="case-text">My specific design contributions included:</p>
            <ul>
                <li>Lunchbox page layout and interaction design</li>
                <li>Checkout page flow and form organization</li>
                <li>Order confirmation page structure and information hierarchy</li>
                <li>Visual consistency across these key conversion points</li>
            </ul>

            <p class="case-text">These pages required careful attention to user experience since they represent the most crucial steps in the ordering process. I ensured that the design supported clear decision-making and smooth progression through the checkout flow.</p>

            <div class="imgs">
                <p>Static HTML Prototypes</p>
                <img src="images/static-html.webp" alt="Static HTML prototypes" class="case-image">
            </div>

            <h3>Backend Development & Database Setup</h3>

            <p class="case-text">On the backend, I contributed to the database architecture and customization functionality that powers the menu system.</p>

            <p class="case-text">Backend contributions included:</p>
            <ul>
                <li>Setting up and importing database tables in phpMyAdmin</li>
                <li>Developing customization logic for menu items</li>
                <li>Database structure optimization for complex menu options</li>
                <li>Data validation for user inputs and selections</li>
            </ul>

            <p class="case-text">I worked extensively with phpMyAdmin to set up the database tables that store menu categories, item options, and customization choices. This foundation was essential for the dynamic pricing and option selection features.</p>

            <div class="imgs">
                <p>PHPMyAdmin Tables</p>
                <img src="images/phpmyadmin-tables.webp" alt="PHPMyAdmin Tables" class="case-image">
            </div>

            <h3>Deployment & Project Hosting</h3>

            <p class="case-text">Beyond development, I was also responsible for hosting and deploying the project to make it accessible for testing and final presentation. This involved managing file transfers and ensuring the application worked correctly in the production environment.</p>

            <p class="case-text">Deployment responsibilities included:</p>
            <ul>
                <li>Setting up and maintaining the web hosting environment</li>
                <li>Using Cyberduck for FTP file transfers to the server</li>
                <li>Ensuring database connectivity in the production environment</li>
                <li>Managing updates and bug fixes throughout the development cycle</li>
                <li>Coordinating with team members for deployment timing</li>
            </ul>

            <p class="case-text">Using Cyberduck, I managed the file transfer process to keep the hosted version of the application up-to-date with our development progress. This was essential for usability testing sessions and for showcasing the project to instructors and stakeholders.</p>

            <div class="imgs">
                <p>Cyberduck FTP Deployment Process</p>
                <img src="images/cyberduck.webp" alt="Cyberduck FTP Deployment Process" class="case-image">
            </div>

            <h3>Testing & Iteration</h3>

            <p class="case-text">I received detailed feedback from our team's testing rounds and was responsible for implementing the necessary changes to improve the functionality I had developed.</p>

            <p class="case-text">Based on testing feedback, I implemented changes including:</p>
            <ul>
                <li>Refining the ordering system workflow for better user understanding</li>
                <li>Improving customization logic and cart functionality</li>
                <li>Enhancing the checkout flow based on user confusion points</li>
                <li>Optimizing the order confirmation process for clarity</li>
            </ul>

            <p class="case-text">The testing feedback revealed areas where the ordering functionality needed refinement, particularly in how customization options were presented and how the lunchbox updates were communicated to users. I implemented these improvements to create a more intuitive experience, focusing on the technical aspects of the features I had built.</p>

        </section>


        <section class="case-section">
            <h2 class="case-subheading">solution</h2>

            <p class="case-text">The final product is a mobile-first ordering web application for Pete's Little Lunch Box. Key features include:</p>
            
            <p class="case-text"><strong>Interactive Menu Selection:</strong> Users can browse menu items with descriptions and prices and select multiple items in a single order.</p>

            <p class="case-text"><strong>Customization Options:</strong> Users can modify orders with options such as bagel type, toppings, spreads, and size, which dynamically affect pricing.</p>

            <p class="case-text"><strong>Real-Time Order Summary:</strong> The system calculates individual item prices, sales tax, and total order cost in real-time. The system calculates:</p>
            <ul>
                <li>individual item prices</li>
                <li>sales tax</li>
                <li>total order cost</li>
            </ul>

            <p class="case-text"><strong>Order Receipt:</strong> After checkout, users receive a receipt with a visible order number for pickup.</p>

            <p class="case-text">These features demonstrate how design, database architecture, and front-end functionality support a clear and efficient ordering experience.</p>

        </section>


        <section class="case-section">
            <h2 class="case-subheading">results</h2>

            <p class="case-text">The project successfully delivered a fully functional web application that met course requirements and demonstrated a complete UX/UI development pipeline.</p>

            <p class="case-text">Key outcomes included:</p>
            <ul>
                <li>A responsive ordering interface built with HTML, CSS, JavaScript, and PHP</li>
                <li>Integrated database tables for menu and customization options</li>
                <li>Iterative improvements from two rounds of usability testing</li>
                <li>Organized collaboration through Microsoft Teams and GitHub</li>
            </ul>

            <p class="case-text">The project highlighted the importance of robust technical architecture in web application development. Through my role as the primary Coder, building scalable, maintainable code and implementing responsive design principles proved essential for creating a seamless user experience.</p>

            <p class="case-text">Usability testing proved valuable in identifying areas where interface clarity and interaction design could improve before final implementation.</p>

            <p class="case-text">Overall, the project demonstrates how UX/UI design, technical development, and collaborative workflows can transform early prototypes into fully realized digital products.</p>
           
            <div class="imgs">
                <p>Final Application Screens</p>
                <img src="images/hero.webp" alt="Final Application Screens">
            </div>

           <h3>Project Links</h3>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/team" target="_blank">Team Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/" target="_blank">Project Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/data/" target="_blank">Database Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/microinteractions.html" target="_blank">Microinteractions Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/order.php" target="_blank">Main Menu Ordering Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/home.php" target="_blank">Final Web Page</a></p>

            <img src="images/3-graphics.webp" alt="Final Application Graphics" class="case-image">
        </section>
</body>
</html>