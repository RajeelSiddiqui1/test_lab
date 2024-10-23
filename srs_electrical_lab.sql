-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 01:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs_electrical_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'blank-profile-picture-973460_1280.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Rajeel Siddiqui', 'rajeelsiddiqui3@gmail.com', 'rajeel123', 'rajeel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_desc` text NOT NULL,
  `c_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `c_desc`, `c_image`) VALUES
(1, 'Resistors', 'Testing resistors in an electrical lab involves several critical steps to ensure their functionality and verify their specified resistance values. Begin with a visual inspection, checking for physical damage such as burns, cracks, or discoloration, which may affect the resistors performance. Next, gather the necessary equipment, including a digital multimeter (DMM), resistor color code chart, alligator clips, and possibly soldering tools if the resistor is part of a circuit. Set the multimeter to the appropriate resistance range based on the expected value of the resistor. If uncertain, start with the highest range and adjust accordingly.To test, ensure the circuit is powered off and, if possible, isolate the resistor by desoldering one leg from the circuit. Connect the multimeter probes to each end of the resistor. The polarity does not matter for resistors. The reading on the multimeter should match the expected resistance value, which can be determined from the resistors color bands or datasheet. Allow for the tolerance range specified, such as 5%, to accommodate slight variations in the measured resistance.If the reading falls outside the tolerance range, the resistor may be faulty. Infinite resistance suggests the resistor is open and no longer functional, while a reading of zero indicates a shorted resistor. In both cases, the resistor must be replaced. Testing resistors within a circuit may yield inaccurate readings due to the influence of other components, so it is best to isolate the resistor when precision is needed. Additionally, temperature fluctuations can affect the resistance, so testing high-power resistors should be done when they have cooled down.For resistors in series or parallel networks, different rules apply. Series resistors sum together for the total resistance, while parallel resistors require the use of a reciprocal formula to calculate the combined resistance. After testing, document the results for future reference, especially for resistors used in critical applications. Accurate testing of resistors ensures the proper functioning of circuits and helps identify any components that may cause performance issues.It is also important to be mindful of the power rating of the resistor during testing, as exceeding the rated power can lead to overheating or failure. High-wattage resistors, which are designed to handle more significant amounts of power, should be tested under load conditions that replicate their actual use in the circuit. Failure to account for these variables could result in improper assessment of the resistors performance.In cases where precision resistors are being used, additional testing methods like using a Wheatstone bridge or specialized equipment may be necessary to achieve the required accuracy. These resistors typically have tighter tolerance values (such as 1% or lower), so even small deviations could significantly impact sensitive circuits. For quality assurance, testing multiple resistors of the same type or batch can help identify any manufacturing inconsistencies. Furthermore, environmental factors such as humidity and prolonged exposure to high temperatures can degrade resistor performance over time. Therefore, periodic testing and inspection are essential for resistors used in environments where conditions vary widely.', 'diode-1719908_1280.png'),
(2, 'Capacitor', '\r\nTesting capacitors in an electrical lab begins with a visual inspection to check for physical damage such as bulging, cracks, leakage, or discoloration which can indicate failure. After ensuring the capacitor is visually intact, the next step involves using a digital multimeter DMM or a capacitance meter. Before testing the capacitor must be fully discharged to avoid electrical hazards and inaccurate readings. Using a multimeter set to the capacitance mode if available connect the probes to the capacitor terminals; polarity does not matter for non-polarized capacitors but is crucial for electrolytic capacitors positive probe to positive terminal. The meter will display the capacitance value which should closely match the rated value printed on the capacitor considering the tolerance range typically 20. If the capacitor shows a reading far off from the expected value or doesnt display any reading open or shorted its likely faulty. For capacitors with no capacitance setting on the multimeter switch the multimeter to resistance mode and observe the behavior as the meter charges the capacitor. A good capacitor will show low resistance initially and gradually increase to infinity as it charges while a shorted capacitor will show zero resistance and an open one will show infinite resistance immediately. In addition to using a multimeter a dedicated capacitance meter can provide more accurate readings for large or small capacitors especially when high precision is needed. When using a capacitance meter connect the capacitor directly to the test terminals or leads ensuring the correct polarity for polarized capacitors. The meter will display the capacitance and any significant deviation from the rated value indicates degradation or failure. For electrolytic capacitors leakage current testing is crucial. Over time electrolytic capacitors can develop leakage currents that reduce their efficiency. To test this apply the rated voltage using a power supply while measuring the leakage current. If the current is excessively high the capacitor is faulty and should be replaced.\r\n\r\nAnother method involves using an oscilloscope and a function generator to check the capacitors response to a known signal. By applying an AC signal and observing the waveform on the oscilloscope you can analyze the capacitors behavior in real-time. A good capacitor will produce a specific phase shift between voltage and current while a bad capacitor may distort the waveform indicating internal issues such as loss of capacitance or dielectric breakdown.\r\n\r\nFor large power capacitors special care is required. These capacitors store significant energy and discharging them through a resistor is necessary before testing to avoid damaging the test equipment or causing personal injury. Once discharged test the capacitors insulation resistance using a megohmmeter to ensure no breakdown of the dielectric material. Insulation resistance should be high and a low value indicates internal shorting or failure of the capacitors dielectric properties.\r\n\r\nLastly its important to document all test results including the measured capacitance resistance and leakage current. This data is useful for tracking capacitor performance over time and ensuring consistent operation in electrical circuits. Regular testing particularly in high-stress environments ensures that capacitors are functioning correctly preventing potential circuit failures.', 'capacitor-1714934_1920.png'),
(3, 'Inductors', 'Testing inductors in an electrical lab involves several methods to ensure they are functioning correctly and meet their specified inductance values. The first step in testing an inductor is a visual inspection to check for any physical damage such as cracks, burn marks, or discoloration. These issues can indicate that the inductor has been subjected to excessive heat or current, potentially leading to failure. The next step in testing an inductor involves the use of a digital multimeter DMM or an LCR meter. A DMM can be used to test the continuity of the inductor and measure its resistance, while an LCR meter can measure its inductance. Before testing, ensure that the inductor is removed from the circuit to avoid interference from other components.\r\n\r\nTo measure the resistance of the inductor using a DMM, set the multimeter to the resistance mode and connect the probes to the inductors terminals. A low resistance reading indicates that the inductors wire is intact and there are no breaks in the coil. However, if the resistance reading is extremely high or infinite, it suggests that the inductor is open and the coil is broken. Once the resistance is verified, you can proceed to measure the inductance. If using an LCR meter, set it to measure inductance and connect the inductor to the test terminals. The meter will display the inductance value, which should match the value specified by the manufacturer or the datasheet. A significant deviation from the expected value indicates that the inductor may be faulty.\r\n\r\nFor inductors with no access to an LCR meter, another method is to use a signal generator and an oscilloscope to analyze the inductors behavior in a circuit. By applying a known AC signal to the inductor and observing the resulting waveform, you can determine whether the inductor is operating correctly. A good inductor will produce a phase shift between the voltage and current, with the current lagging behind the voltage by 90 degrees. Any distortion in the waveform or a lack of phase shift can indicate problems with the inductors core material or windings.\r\n\r\nIn addition to these basic tests, more advanced methods can be used to analyze the performance of inductors, particularly in high-frequency applications. One such method is the Q factor test, which measures the quality factor of the inductor. The Q factor is a measure of the inductors efficiency, calculated as the ratio of its inductive reactance to its resistance at a given frequency. To perform this test, you will need an impedance analyzer or a specialized Q meter. By measuring the inductors impedance at different frequencies, you can calculate its Q factor and determine how well it performs at various operating frequencies. A high Q factor indicates that the inductor has low losses and is suitable for high-frequency applications, while a low Q factor suggests that the inductor is lossy and may not perform well in such environments.\r\n\r\nAnother important aspect of inductor testing is the measurement of its saturation current. Inductors are designed to operate within a specific range of currents, and exceeding this range can cause the core material to saturate, resulting in a loss of inductance and increased losses. To test the saturation current, you will need a DC power supply capable of delivering high currents and a current probe to measure the inductors current. Gradually increase the current through the inductor while monitoring its inductance using an LCR meter or impedance analyzer. The point at which the inductance begins to decrease significantly indicates the inductors saturation current. It is important to stay within this current limit during normal operation to prevent damage to the inductor and ensure optimal performance.\r\n\r\nFor inductors used in power applications, it is also essential to test their thermal performance. Inductors generate heat due to the resistance of their windings and core losses, and excessive heat can lead to degradation of the inductor over time. To test the thermal performance of an inductor, apply the rated current to the inductor and measure its temperature using a thermal camera or thermocouple. Compare the measured temperature with the manufacturers specifications to ensure that the inductor is operating within safe limits. If the inductors temperature exceeds the specified maximum, it may indicate that the inductor is undersized for the application or that there is a problem with its construction.\r\n\r\nIn addition to these tests, it is important to consider the mechanical aspects of inductor testing. Inductors, especially those used in power applications, are often subjected to mechanical stresses such as vibration and shock. These stresses can cause the inductors core or windings to become loose or damaged, leading to performance degradation or failure. To test the mechanical integrity of an inductor, subject it to vibration and shock tests using specialized equipment. After the tests, recheck the inductors electrical parameters to ensure that they have not changed significantly. If the inductor shows signs of mechanical damage or changes in its electrical properties, it may need to be replaced.\r\n\r\nFinally, when testing inductors, it is important to document all test results for future reference. This includes recording the measured resistance, inductance, Q factor, saturation current, and thermal performance. Keeping a record of these values allows for tracking the performance of inductors over time and helps identify potential issues before they lead to failure. Regular testing of inductors, particularly in high-stress environments, is essential to ensure their reliability and prevent costly downtime in electrical systems.\r\n\r\nIn conclusion, testing inductors in a lab involves a combination of visual inspections, electrical measurements, and mechanical tests to ensure that they are functioning correctly and meet their specified performance criteria. By following these procedures and documenting the results, you can ensure the reliability and longevity of inductors in a wide range of applications. Whether used in low-frequency power supplies or high-frequency RF circuits, inductors play a crucial role in the performance of electrical systems, and proper testing is essential to maintaining their effectiveness.', 'technology-electronic-computer-motherboard.jpg'),
(4, 'Transformers', 'Testing transformers in an electrical lab involves several key steps to ensure their functionality, efficiency, and safety. The process begins with a thorough visual inspection to check for any physical damage such as cracks, burn marks, or signs of overheating, which can be indicators of a faulty transformer. Its important to examine the transformer windings, insulation, terminals, and core for any visible defects. After the visual inspection, the transformer should be de-energized and disconnected from any circuit to prevent damage to the testing equipment or injury to the technician.\r\n\r\nThe next step is to perform a continuity test using a digital multimeter (DMM). This test ensures that the transformer windings are intact and that there are no breaks in the circuit. Set the multimeter to the resistance or continuity mode, and check each winding by placing the probes across the respective terminals. A good transformer winding will show a low resistance value, indicating that the circuit is closed and continuous. If the multimeter shows infinite resistance, it indicates an open winding, meaning the transformer is damaged and needs to be replaced.\r\n\r\nOnce continuity is confirmed, the insulation resistance test should be conducted to ensure the windings are properly insulated from each other and from the transformer core. This is especially important for high-voltage transformers. To perform this test, use a megohmmeter (also known as an insulation resistance tester). Apply the test probes to the primary and secondary windings, as well as between the windings and the core. A high resistance value (typically in the range of megaohms) indicates that the insulation is good. If the insulation resistance is low, it suggests there could be a breakdown in the insulation, which could lead to short circuits or electrical leakage during operation.\r\n\r\nThe next test is the turns ratio test, which verifies the relationship between the primary and secondary windings. This is crucial because the transformers turns ratio determines how the voltage is stepped up or down between the windings. A turns ratio tester is used to perform this test. Connect the tester to the transformer, and it will automatically apply a low voltage to the primary winding and measure the induced voltage in the secondary winding. The tester will then calculate the turns ratio and compare it with the manufacturers specifications. A significant deviation from the expected ratio may indicate internal winding damage or shorted turns, which can affect the transformers performance.\r\n\r\nAfterward, perform the open-circuit and short-circuit tests to assess the transformers efficiency and losses. For the open-circuit test, the secondary winding is left open, and a low voltage is applied to the primary winding. This test measures the core losses (also known as iron losses) due to hysteresis and eddy currents in the transformer core. A wattmeter is used to measure the power consumed during this test, and the results should be compared with the transformers rated specifications. Excessive core losses could indicate issues such as improper core construction or material degradation.\r\n\r\nThe short-circuit test, on the other hand, involves shorting the secondary winding and applying a reduced voltage to the primary winding. This test measures the copper losses (also known as I2R losses) in the transformer windings. Again, a wattmeter is used to record the power consumed, and the results should be compared with the rated values. If the copper losses are significantly higher than expected, it may suggest that the windings are damaged, have poor conductivity, or have increased resistance due to age or overheating.\r\n\r\nAnother important test is the polarity test, especially for transformers that will be connected in parallel. Transformers with incorrect polarity can cause phase differences, leading to circulating currents and possible damage. To perform a polarity test, apply a small voltage to the primary winding and measure the relative polarity of the secondary winding. The test ensures that the primary and secondary windings are correctly oriented so that their voltages are in phase.\r\n\r\nFor transformers used in power applications, it is important to measure the transformers voltage regulation. Voltage regulation is the difference between the no-load and full-load voltage expressed as a percentage of the full-load voltage. Poor voltage regulation can result in an unstable output voltage, which may affect the performance of the connected load. To test voltage regulation, first measure the no-load voltage by applying the rated voltage to the primary winding and measuring the secondary output with no load connected. Then, connect a resistive load to the secondary winding and measure the voltage again under full-load conditions. Calculate the voltage regulation using the formula: ((No-load voltage - Full-load voltage) / Full-load voltage)  100%. Good transformers will have low voltage regulation, typically less than 5%, indicating that the output voltage remains relatively stable under varying loads.\r\n\r\nThe transformers impedance is another important parameter that can be measured in the lab. Transformer impedance affects the short-circuit current and the voltage drop across the windings. It is usually specified as a percentage and is tested by applying a short-circuit to the secondary winding and gradually increasing the voltage on the primary winding until the rated current flows through the windings. The voltage required to achieve this current, relative to the rated primary voltage, is used to calculate the impedance. High impedance can limit short-circuit currents but may also reduce voltage regulation, while low impedance can cause excessive current during faults, which may lead to transformer failure.\r\n\r\nIn addition to these electrical tests, transformers are often subjected to temperature rise tests to assess their thermal performance under load. Transformers generate heat during operation due to core losses and copper losses, and excessive heat can degrade the insulation and reduce the transformers lifespan. To perform a temperature rise test, operate the transformer at its rated load for a specified period while monitoring the temperature of the windings and the core using thermocouples or infrared thermometers. The temperature rise should not exceed the limits specified by the manufacturer. If the temperature exceeds the specified limit, it may indicate that the transformer is undersized for the application or that there is an issue with its cooling system.\r\n\r\nFinally, document all test results, including the continuity, insulation resistance, turns ratio, core losses, copper losses, voltage regulation, impedance, and temperature rise. Keeping a record of these values helps in maintaining the performance and reliability of transformers over time. It also aids in identifying any potential issues before they lead to failures in the field.\r\n\r\nIn conclusion, testing transformers in a lab involves a combination of electrical and mechanical tests to verify their functionality, efficiency, and safety. Proper testing ensures that transformers operate within their specified parameters and can handle the demands of the electrical systems they support. Regular testing and maintenance are critical for ensuring the long-term reliability of transformers, particularly in high-stress environments where power quality and stability are essential. By following the appropriate testing procedures, transformers can be monitored for signs of wear and degradation, preventing unexpected failures and ensuring the smooth operation of electrical systems.', 'man-florist-working-green-house.jpg'),
(5, 'Diodes', 'Testing diodes in a lab involves a series of steps to ensure their functionality, starting with a visual inspection. This inspection checks for any physical damage, such as cracks, burn marks, or discoloration, which may indicate that the diode has overheated or failed. It is essential to make sure that the diode is properly mounted and there are no loose connections or corrosion at the terminals. After the visual inspection, the diode should be de-energized and disconnected from the circuit to prevent any damage to the test equipment or false readings.\r\n\r\nThe most common tool used for testing diodes is a digital multimeter (DMM) that has a specific diode test mode. In this mode, the multimeter applies a small voltage to the diode to check its forward and reverse bias characteristics. To begin the test, place the multimeter in diode test mode and connect the red (positive) probe to the anode and the black (negative) probe to the cathode. In a working diode, the multimeter should display a small voltage drop, typically between 0.6V and 0.7V for a silicon diode and around 0.2V to 0.3V for a germanium diode. This indicates that the diode is forward-biased and is allowing current to flow in the forward direction.\r\n\r\nNext, reverse the probes by connecting the red probe to the cathode and the black probe to the anode. In reverse bias, a good diode should block current, and the multimeter should display either \"OL\" (over-limit) or a very high resistance value, indicating that no current is flowing through the diode in the reverse direction. If the diode shows a voltage drop in both directions, it is shorted and must be replaced. Similarly, if the multimeter displays \"OL\" in both directions, the diode is open and no longer functional.\r\n\r\nFor more accurate results, especially when dealing with high-power diodes or zener diodes, additional tests can be conducted. In the case of zener diodes, it is necessary to test the breakdown voltage, which is a key feature of zener diodes as they are designed to conduct in reverse once a specific breakdown voltage is reached. To test this, connect a variable DC power supply in reverse bias configuration across the zener diode, with a resistor in series to limit current. Gradually increase the voltage while monitoring the voltage across the zener diode. Once the applied voltage reaches the breakdown point, the voltage across the diode will stabilize at the zener voltage, confirming its proper operation. If the diode fails to stabilize or breaks down prematurely, it is likely faulty.\r\n\r\nAnother method to test diodes, particularly in high-frequency circuits or power supplies, is by using an oscilloscope and a function generator. The function generator applies an AC signal to the diode, and the oscilloscope is used to observe the waveform across the diode. A functioning diode will clip the waveform in the reverse direction, allowing current only in the forward direction. This method is especially useful for detecting issues in fast-switching diodes used in rectifiers or signal processing circuits, where traditional DC testing methods may not reveal high-frequency performance issues.\r\n\r\nIn addition to basic forward and reverse bias tests, diodes can be tested for leakage current in reverse bias. Leakage current is the small current that flows through the diode when it is reverse biased, and it should be minimal in a good diode. To test for leakage current, apply a reverse voltage across the diode using a DC power supply, and measure the current with a sensitive ammeter. If the leakage current exceeds the manufacturers specifications, the diode may be degrading, even if it passes basic tests.\r\n\r\nFor diodes used in power applications, its also essential to test their thermal performance and ensure they can handle the rated power without overheating. This is particularly important for diodes used in rectifiers and power supply circuits, where they convert AC to DC and may experience high currents and voltages. To test this, apply the diode under load conditions and monitor its temperature using a thermocouple or an infrared thermometer. Excessive heat generation may indicate poor thermal management or a diode that is not rated for the application.\r\n\r\nAnother important test for diodes, especially Schottky and fast recovery diodes, is the reverse recovery time test. Reverse recovery time is the time it takes for a diode to switch from conducting in forward bias to blocking in reverse bias. This is critical in high-speed switching applications, such as in power supplies or RF circuits. To perform this test, use a pulse generator to rapidly switch the diode between forward and reverse bias, and measure the reverse recovery time using an oscilloscope. A good diode will have a recovery time within the specified limits, while a diode with a slow recovery time may cause inefficiency and heat in high-frequency circuits.\r\n\r\nIn high-voltage applications, the peak inverse voltage (PIV) of a diode must be tested to ensure it can withstand the maximum reverse voltage in the circuit without breaking down. This test is conducted by applying increasing reverse voltage to the diode until it reaches the rated PIV. Any breakdown before this point indicates a diode that is unsuitable for high-voltage applications.\r\n\r\nAfter completing all the necessary electrical tests, it is crucial to document the results, including forward voltage drop, reverse bias characteristics, leakage current, reverse recovery time, and thermal performance. Keeping these records helps in maintaining the reliability of diodes in critical circuits and provides valuable data for future troubleshooting.\r\n\r\nIn conclusion, testing diodes in a lab involves several electrical tests to verify their performance and reliability. These tests ensure that the diode operates correctly in both forward and reverse bias, can handle the required power, and performs efficiently in high-speed or high-voltage applications. Regular testing and monitoring of diodes are essential in preventing circuit failures and ensuring the long-term reliability of electronic systems. Proper testing techniques help detect early signs of diode degradation, allowing for timely replacement and maintaining the overall efficiency and safety of the system.', 'top-view-wires-tech-background.jpg'),
(6, 'Transistors', 'Testing transistors in a lab involves a series of steps to ensure their functionality and proper operation in electronic circuits. A transistor is a three-terminal device consisting of a base, collector, and emitter, and can either be an NPN or PNP type. Before beginning the electrical tests, a visual inspection should be conducted. This inspection checks for any signs of damage such as burns, cracks, discoloration, or loose connections, which could indicate that the transistor has been exposed to excessive heat, electrical overstress, or mechanical damage. It is important to ensure that the transistor is properly mounted, and its pins are free from corrosion.\r\n\r\nOnce the visual inspection is complete, the transistor should be removed from the circuit, if possible, to prevent interference from other components. The most commonly used tool for testing transistors is a digital multimeter (DMM), which has a specific transistor testing mode or can be used in diode testing mode for basic tests. The first step is to identify the base, collector, and emitter terminals of the transistor, which can be determined by consulting the datasheet or using a multimeter in continuity mode to identify the junctions.\r\n\r\nTo test an NPN transistor, set the multimeter to diode mode. Place the red (positive) probe on the base terminal and the black (negative) probe on the emitter terminal. A good NPN transistor will show a forward voltage drop between 0.6V and 0.7V. Next, connect the red probe to the base and the black probe to the collector; a similar forward voltage drop should be displayed. These readings indicate that the base-emitter and base-collector junctions are forward-biased and functioning correctly. To check the reverse bias, reverse the probes by placing the black probe on the base and the red probe on either the collector or emitter; the multimeter should display \"OL\" (over-limit) or a high resistance value, indicating the junctions are not conducting in reverse bias. For PNP transistors, the procedure is similar, except the polarity of the multimeter probes is reversed: the black probe goes to the base, and the red probe goes to the emitter or collector during forward bias testing.\r\n\r\nIf the multimeter displays a voltage drop in both directions, the transistor is shorted and no longer operational. If \"OL\" appears in both directions, the transistor is open and non-functional. After testing the base-collector and base-emitter junctions, check the collector-emitter path. There should be no conduction (infinite resistance) between the collector and emitter terminals when the base is not biased. If there is any conduction, the transistor is likely damaged or has an internal short.\r\n\r\nIn addition to using a multimeter, a transistor tester or component analyzer can provide more detailed information about the transistors characteristics. These devices can automatically identify the type of transistor (NPN or PNP), measure the current gain (hFE), and display the base-emitter voltage (VBE). Testing the hFE is important as it indicates how much the transistor amplifies current. For a good transistor, the hFE value should fall within the range specified in the datasheet. If the gain is significantly lower than expected, the transistor may be degraded, even if it passes basic diode tests.\r\n\r\nFor more advanced testing, particularly for transistors used in high-frequency or power applications, additional tests may be required. One important test is the saturation voltage, which determines how efficiently the transistor switches on in saturation mode. To test this, apply a known base current and measure the voltage between the collector and emitter when the transistor is fully on. The saturation voltage should be low, typically below 0.3V for small-signal transistors. A higher saturation voltage may indicate internal resistance or degradation, which could affect the transistors switching performance in a circuit.\r\n\r\nAnother crucial parameter to test is the transistors switching speed, especially in applications where it is used as a high-speed switch, such as in digital circuits or power supplies. Using an oscilloscope and a signal generator, the transistor can be tested by applying a square wave to the base and observing the rise and fall times of the collector current. A good transistor will switch quickly with minimal delay, while a transistor with slow switching times may cause inefficiencies in the circuit or even thermal issues due to increased power dissipation.\r\n\r\nFor high-power transistors, thermal testing is also important. These transistors are often used in power amplifiers or switching regulators, where they dissipate significant heat. To test the thermal performance, operate the transistor under load conditions and monitor the temperature using a thermocouple or infrared thermometer. Excessive heat generation or a rapid increase in temperature may indicate poor thermal management or a transistor that is not suitable for the application. A heat sink should be used to prevent overheating during these tests.\r\n\r\nLeakage current is another factor that should be tested, particularly for transistors in high-sensitivity circuits. Leakage current occurs when a small amount of current flows through the transistor even when it is in the off state. To test for leakage, connect the multimeter in current measurement mode between the collector and emitter, with the base not biased. A good transistor should exhibit minimal leakage current, typically in the nanoampere (nA) range. If the leakage current is significantly higher, the transistor may be faulty or unsuitable for precision applications.\r\n\r\nIn circuits where transistors are used as amplifiers, the linearity of the transistor is important. This can be tested using an oscilloscope and a signal generator. Apply a small AC signal to the base and observe the output signal at the collector. A good transistor will produce a clean, amplified output without distortion. Distortion or non-linearity in the output signal may indicate that the transistor is no longer functioning within its optimal operating range.\r\n\r\nFor field-effect transistors (FETs), testing involves different techniques since FETs operate by controlling current with an electric field rather than current at the base. For testing an n-channel FET, connect the multimeter in diode mode between the drain and source terminals, and apply a small voltage to the gate. The multimeter should show conduction when the gate is biased and no conduction when the gate is not biased. Similar principles apply to p-channel FETs, but with reversed polarities.\r\n\r\nIn summary, testing transistors in a lab requires a variety of techniques to ensure they function properly in different applications, from basic diode tests to more advanced methods such as switching speed and leakage current analysis. By thoroughly testing transistors, electrical engineers can ensure the reliability of their circuits and identify any faulty components before they cause failures. Regular testing and documentation of transistor performance are essential in maintaining the efficiency and stability of electronic systems.', 'motherboard-background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cpri_product`
--

CREATE TABLE `cpri_product` (
  `id` int(11) NOT NULL,
  `product_id` int(12) NOT NULL,
  `test_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `message` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','approved') NOT NULL,
  `message2` text NOT NULL,
  `status2` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cpri_product`
--

INSERT INTO `cpri_product` (`id`, `product_id`, `test_id`, `product_name`, `product_description`, `product_quantity`, `product_image`, `product_price`, `message`, `category_id`, `user_id`, `status`, `message2`, `status2`) VALUES
(1, 1029384756, 2147483647, '10kΩ Carbon Film Resistor', 'A 10kΩ carbon film resistor with a power rating of 0.25 watts and a tolerance of 5%. It is widely used in electronic circuits for current limiting and voltage regulation. Perfect for hobby electronics, DIY projects, and prototypin', 550, 'gettyimages-172924172-612x612.jpg', 2.00, 'i aproved this product wait for Specail CPRI testet response', 1, 15, 'approved', '\nI approved this product also\nnot aaproved', 'approved'),
(7, 2147483647, 2147483647, 'NPN Transistor - 2N2222', 'The 2N2222 is a popular NPN bipolar junction transistor (BJT) designed for high-speed switching and general-purpose amplification. It is widely used in low-power applications due to its small size and efficient performance. The transistor can handle currents up to 800mA and operates at a voltage range of 40V. The 2N2222 is ideal for use in switching circuits, signal processing, and driving other electronic components such as relays and LEDs.', 98, 'tansistor.jpg', 5.00, 'approved this', 6, 15, 'approved', '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `cpri_show_to_user`
--

CREATE TABLE `cpri_show_to_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `work_experience` varchar(50) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cpri_show_to_user`
--

INSERT INTO `cpri_show_to_user` (`id`, `fullname`, `email`, `education`, `skills`, `work_experience`, `portfolio`, `country`, `image`, `category_id`) VALUES
(3, 'Riya Patel', 'riya.patel@example.in', 'MSc Electrical Engineering', 'Power Systems, Circuit Breaker Testing, Automation', '13', 'https://riya-codeworld.com', 'India', 'young-pretty-model-is-smiling.jpg', 3),
(4, 'Ayesha Khan', 'aysha@gmail.com', 'PhD', 'Electrical Testing, Circuit Analysis, Safety Compliance', '16', 'https://ayeshakportfolio.com', 'Pakistan', 'medium-shot-asian-woman-outdoors.jpg', 2),
(5, 'Carlos Ramire', 'carlos@gmail.com', 'Masters Degree', 'Electrical Panel Testing, Safety Compliance', '15', 'http://carlosrprojects.com', 'Mexico', '240_F_261380654_u1qj1U5p5sA6iDxhsft5xSpE4sNinwwX.jpg', 6),
(7, 'Wei Ling', 'wei.ling@example.cn', 'BEng Electrical Engineering', 'Control Systems, Electrical Inspections, Diagnostics', '10', 'https://weiling.dev', 'China', 'front-view-young-man-posing-indoors_23-2151038493.jpg', 4),
(8, 'Takumi Nakamura', 'takumi@gmail.com', 'PhD', 'High Voltage Testing, Power Systems, Automation', '12', 'takumitech.com', 'Japan', 'young-japanese-influencer-recording-vlog_23-2149187774.jpg', 5),
(11, 'Jimmi Johnson', 'johnson@example.com', 'PhD', 'Master of Science in Information Technology', '13', 'alice-portfolio.com', 'Japan', 'istockphoto-1364917563-612x612.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpr_tester`
--

CREATE TABLE `cpr_tester` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cpr_tester`
--

INSERT INTO `cpr_tester` (`id`, `full_name`, `email`, `education`, `contact_number`, `work_experience`, `salary`, `skills`, `portfolio_url`, `comments`, `country`, `image`, `category_id`, `password`, `status`) VALUES
(1, 'Jimmi Johnson', 'johnson@example.com', 'PhD', '44-7911-654321', '13', '$90001-$100000', 'Master of Science in Information Technology', 'https://alice-portfolio.com', 'Highly skilled in Agile environments and CI/CD pipelines', 'Japan', 'istockphoto-1364917563-612x612.jpg', 1, '$2y$10$3t0oNmiq75R6Mp57SIvdeuxqZ2JA.vQe6r63lSKDPLzBkLN.oIeI2', 'approved'),
(2, 'Riya Patel', 'riya.patel@example.in', 'MSc Electrical Engineering', '919876543210', '13', '$60001-$70000', 'Power Systems, Circuit Breaker Testing, Automation', 'https://riya-codeworld.com', 'Experienced in industrial electrical systems testing', 'India', 'young-pretty-model-is-smiling.jpg', 3, '$2y$10$LctS0fe4T3s7BWeSTX4INeYcLLAYvUXeY5vVgPPEbgRc/nWec5F/W', 'approved'),
(3, 'Ayesha Khan', 'aysha@gmail.com', 'PhD', '03001234567', '16', '$100001+', 'Electrical Testing, Circuit Analysis, Safety Compliance', 'https://ayeshakportfolio.com', 'Proficient in electrical testing procedures and tools', 'Pakistan', 'medium-shot-asian-woman-outdoors.jpg', 2, '$2y$10$BDJUuCEJkMUgdvBw4D9cEuZHTDnkPlVZ4QuyCYvRXTCC.3NlvvW4i', 'approved'),
(4, 'Takumi Nakamura', 'takumi@gmail.com', 'PhD', '13012345678', '12', '$80001-$90000', 'High Voltage Testing, Power Systems, Automation', 'http://takumitech.com', 'Expert in high voltage and power systems testing', 'Japan', 'young-japanese-influencer-recording-vlog_23-2149187774.jpg', 5, '$2y$10$ihaRNR/9bWVa0BwYjAYV1.j7/B6JJiFzAYdGuyAwAR0eOgfwqSLVi', 'approved'),
(5, 'Carlos Ramire', 'carlos@gmail.com', 'Masters Degree', '525512345678', '15', '$100001+', 'Electrical Panel Testing, Safety Compliance', 'http://carlosrprojects.com', 'Knowledgeable in electrical panel testing', 'Mexico', '240_F_261380654_u1qj1U5p5sA6iDxhsft5xSpE4sNinwwX.jpg', 6, '$2y$10$LctS0fe4T3s7BWeSTX4INeYcLLAYvUXeY5vVgPPEbgRc/nWec5F/W', 'approved'),
(6, 'Wei Ling', 'wei.ling@example.cn', 'BEng Electrical Engineering', '8613012345678', '10', '$50001-$60000', 'Control Systems, Electrical Inspections, Diagnostics', 'https://weiling.dev', 'Skilled in electrical diagnostics and inspections', 'China', 'front-view-young-man-posing-indoors_23-2151038493.jpg', 4, '$2y$10$LctS0fe4T3s7BWeSTX4INeYcLLAYvUXeY5vVgPPEbgRc/nWec5F/W', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `show_tester_to_user`
--

CREATE TABLE `show_tester_to_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `work_experince` varchar(50) NOT NULL,
  `protfolio` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_tester_to_user`
--

INSERT INTO `show_tester_to_user` (`id`, `fullname`, `email`, `education`, `skills`, `work_experince`, `protfolio`, `country`, `image`, `category_id`) VALUES
(12, 'James Smith', 'james.smith@gamil.com', 'Masters Degree', 'Mobile Testing, Appium, Cypress', '9', 'https://jamessmithportfolio.com', 'France', 'close-up-smiley-man-outdoors (1).jpg', 6),
(17, 'John Doe', 'john@gmail.com', 'Associate Degree', 'Automation Testing, Selenium, JIRA', '13', 'http://johndoeportfolio.com', 'Germany', 'portrait-young-man-with-green-hoodie.jpg', 2),
(18, 'amna', 'amna@gmail.com', 'PhD', 'Performance Testing, LoadRunner, TestRail', '6', 'http://amnaprotfolio.com', 'Pakistan', 'portrait-female-tourist-visiting-great-wall-china.jpg', 3),
(19, 'Emily Johnson', 'emily.johnson@gmail.com', 'PhD', 'Security Testing, Burp Suite, OWASP', '8', 'http://emilyjohnsonportfolio.com', 'Denmark', 'portrait-beautiful-woman-night-city-lights.jpg', 5),
(20, 'Roman Mario', 'roman@gmail.com', 'Associate Degree', 'Manual Testing, Selenium, JIRA', '5', 'romanprotfolio.com', 'United Kingdom', 'guy-plaid-shirt.jpg', 4),
(21, 'Alice Johnson', 'alice.johnson@example.com', 'Associate Degree', 'Master of Science in Information Technology', '9', 'sarahjportfolio.com', 'United States', 'cheerful-young-man-nightclub.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` bigint(20) NOT NULL,
  `test_id` bigint(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` int(20) NOT NULL,
  `message` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `test_id`, `product_name`, `product_description`, `product_quantity`, `product_image`, `product_price`, `message`, `category_id`, `user_id`, `status`) VALUES
(1029384756, 444111856563, '10kΩ Carbon Film Resistor', 'A 10kΩ carbon film resistor with a power rating of 0.25 watts and a tolerance of 5%. It is widely used in electronic circuits for current limiting and voltage regulation. Perfect for hobby electronics, DIY projects, and prototypin', 550, 'gettyimages-172924172-612x612.jpg', 2, 'i aproved this product wait for Specail CPRI testet response', 1, 15, 'approved'),
(1234567890, 464858616817, '100μF Electrolytic Capacitor', 'A 100μF electrolytic capacitor rated at 25V, ideal for smoothing applications in power supplies and audio circuits. It features low ESR for efficient performance', 300, 'gettyimages-172962646-612x612.jpg', 4, 'your product is soo boring', 2, 15, 'declined'),
(2147483647, 320160969310, 'ElectraNova: The Pulse of Modern Innovation', 'In the heart of every technological marvel, there exists a silent force driving progress—ElectraNova. This world of electrical systems is more than just the flow of electric charge; its the pulse that powers our cities, fuels industries, and connects lives. ElectraNova harnesses energy in its purest form, transforming the invisible flow of electrons into the visible wonders of modern civilization. Whether in the design of cutting-edge smart grids or the development of renewable energy sources like solar and wind, ElectraNova leads the way. Electrical engineers, the true architects of this force, create intricate circuits, innovate energy solutions, and ensure that every flicker of light, every hum of a motor, and every spark of technology operates seamlessly. As we push towards a future of sustainable power and intelligent automation, ElectraNova remains the unseen force guiding humanitys path forward—charged, dynamic, and limitless in potential.', 21, 'electrical-transformers-500x500.jpeg', 2000, 'i aproved this wait for speical tester', 4, 18, 'approved'),
(2493027482, 709468278783, 'DiodeDynex: The Guardians of Electrical Flow', 'Within the intricate world of electronics, DiodeDynex stands as the silent sentinel, directing and controlling the flow of electric current with precision. From the bright glow of LEDs to the steady reliability of standard diodes and the voltage-regulating prowess of zener diodes, these tiny components are the unsung heroes of countless devices. Whether converting AC to DC or safeguarding circuits from surges, DiodeDynex ensures that electricity moves exactly where it needs to go, illuminating paths and powering innovation. In every circuit, these diodes are essential, bridging the gap between concept and functionality, guiding the pulse of modern electronics with unmatched expertise.', 67, 'disdoer.jpg', 25, '', 5, 18, 'pending'),
(2984749773, 126597172497, 'NPN Transistor - 2N2222', 'The 2N2222 is a popular NPN bipolar junction transistor (BJT) designed for high-speed switching and general-purpose amplification. It is widely used in low-power applications due to its small size and efficient performance. The transistor can handle currents up to 800mA and operates at a voltage range of 40V. The 2N2222 is ideal for use in switching circuits, signal processing, and driving other electronic components such as relays and LEDs.', 98, 'tansistor.jpg', 5, 'approved this', 6, 15, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `testers`
--

CREATE TABLE `testers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `skills` text NOT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testers`
--

INSERT INTO `testers` (`id`, `full_name`, `email`, `education`, `contact_number`, `work_experience`, `salary`, `skills`, `portfolio_url`, `comments`, `country`, `image`, `category_id`, `password`, `status`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', 'Associate Degree', '44-7911-654321', 9, '$60001-$70000', 'Master of Science in Information Technology', 'http://sarahjportfolio.com', 'Experienced in electrical systems testing, specializing in power distribution and fault analysis.', 'United States', 'cheerful-young-man-nightclub.jpg', 1, '$2y$10$3/QPT6FNAWVDOilRXu5JYuQ57l9GUfTUEE0Ya/sQb2l2TmPZ4A6lO', 'approved'),
(2, 'John Doe', 'john@gmail.com', 'Associate Degree', '+1234567890', 13, '$90001-$100000', 'Automation Testing, Selenium, JIRA', 'http://johndoeportfolio.com', 'Experienced in manual and automation testing', 'Germany', 'portrait-young-man-with-green-hoodie.jpg', 2, '$2y$10$dH2I0ci8QnmdUpkeiD2V0esoDsF9bGdXZlVaTRgO06j522sWQV0AO', 'approved'),
(6, 'amna', 'amna@gmail.com', 'PhD', '03390453453', 6, '$60001-$70000', 'Performance Testing, LoadRunner, TestRail', 'http://amnaprotfolio.com', 'Focused on performance testing', 'Pakistan', 'portrait-female-tourist-visiting-great-wall-china.jpg', 3, '$2y$10$La.Uw7V9TWp0AkwT.gKihekvKhr7lj0F91sQSqe7BA/tjjTeM7/UK', 'approved'),
(7, 'Roman Mario', 'roman@gmail.com', 'Associate Degree', '234567890', 5, '$20000-$30000', 'Manual Testing, Selenium, JIRA', 'http://romanprotfolio.com', 'Skilled in automation testing', 'United Kingdom', 'guy-plaid-shirt.jpg', 4, '$2y$10$XY87z/79jMbyjTTL8mMtZ.o6IW5FI8diUXlWo13LrTy6ztXJWoizi', 'approved'),
(8, 'Emily Johnson', 'emily.johnson@gmail.com', 'PhD', '321654987', 8, '$60001-$70000', 'Security Testing, Burp Suite, OWASP', 'http://emilyjohnsonportfolio.com', 'Expert in security testing', 'Denmark', 'portrait-beautiful-woman-night-city-lights.jpg', 5, '$2y$10$JDsurDcSi2B1.8xbqFUigujIy7woIiQu9gwEylwGrFOV6rtNgJ702', 'approved'),
(9, 'James Smith', 'james.smith@gamil.com', 'Masters Degree', '4561237890', 9, '$70001-$80000', 'Mobile Testing, Appium, Cypress', 'https://jamessmithportfolio.com', 'Specialized in mobile app testing', 'France', 'close-up-smiley-man-outdoors (1).jpg', 6, '$2y$10$eBY2sX8ZHG3kUYr4SAEp4.mf3eW48HEXlUq.Zr/6wKRLwGfKsGgFW', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `website_link` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  `cardholder_name` varchar(100) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `department`, `country`, `contact_number`, `image`, `website_link`, `created_at`, `updated_at`, `reset_token`, `token_expiry`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `billing_address`, `total_price`, `status`) VALUES
(15, 'Rajeel Siddiqui', 'rajeelsiddiqui3@gmail.com', '$2y$10$1Bl/17/K59p3Ppj.6cjwLOM9MPsPFHQ.jAQ8.4EyTREJvmEjccyKi', 'civic', 'Pakistan', '03300644215', 'pexels-blitzboy-1040881.jpg', '', '2024-10-01 13:03:08', '2024-10-10 10:43:09', '8d73c9200002c834b6deb6e92bfa5a92fbb7ac254b8653a522dd479142ff1c14', '2024-10-10 13:13:09', '', '', '', '', '', '', 'approved'),
(18, 'Ali Electrical', 'alielectrical@gmail.com', '$2y$10$nY0t0adoJWzBdjeFntIBme9aT4T9cCQjiqGvrrU2zsVKVHW5VjwOq', 'capicitor', 'Pakistan', '03339856123', '', 'aliwebsite.com', '2024-10-10 04:16:33', '2024-10-10 08:22:43', NULL, NULL, 'Ali', '4111 1111 1111 1111', '12/26', '123', ' 1234 Elm St, Springfield, IL, 62704', '5000', 'approved'),
(19, 'ibrahim ameen', 'ibrahimamin032525@gmail.com', '$2y$10$QUOitTpa9RShq8Fz5ZaGWeNJVYzVz3caWll18gmy0U1n/1cpnD65O', 'capicitor', 'Pakistan', '03300644215', '', 'aliwebsite.com', '2024-10-10 10:37:32', '2024-10-10 10:41:02', '565a2cc4322542e3c9b3f40f49159df058b6831e0961edefe72e37ca2f175785', '2024-10-10 13:11:02', 'ibrahim', '4111 1111 1111 1111', '12/45', '123', 'Kasur town', '5000', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpri_product`
--
ALTER TABLE `cpri_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cpri_show_to_user`
--
ALTER TABLE `cpri_show_to_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `cpr_tester`
--
ALTER TABLE `cpr_tester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `show_tester_to_user`
--
ALTER TABLE `show_tester_to_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `testers`
--
ALTER TABLE `testers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cpri_product`
--
ALTER TABLE `cpri_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cpri_show_to_user`
--
ALTER TABLE `cpri_show_to_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cpr_tester`
--
ALTER TABLE `cpr_tester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `show_tester_to_user`
--
ALTER TABLE `show_tester_to_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2984749774;

--
-- AUTO_INCREMENT for table `testers`
--
ALTER TABLE `testers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpri_product`
--
ALTER TABLE `cpri_product`
  ADD CONSTRAINT `cpri_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `cpri_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cpri_show_to_user`
--
ALTER TABLE `cpri_show_to_user`
  ADD CONSTRAINT `cpri_show_to_user_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cpr_tester`
--
ALTER TABLE `cpr_tester`
  ADD CONSTRAINT `cpr_tester_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `show_tester_to_user`
--
ALTER TABLE `show_tester_to_user`
  ADD CONSTRAINT `show_tester_to_user_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `testers`
--
ALTER TABLE `testers`
  ADD CONSTRAINT `testers_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
