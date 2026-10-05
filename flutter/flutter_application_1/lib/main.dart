import 'package:flutter/material.dart';

import 'mobil_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Rental Kendaraan',
      home: const MobilPage(),
    );
  }
}
