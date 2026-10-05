import 'package:flutter/material.dart';

import 'api_service.dart';
import 'mobil.dart';

void main() {
  runApp(const MyApp());
}

// =========================
// APLIKASI UTAMA
// =========================
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

// =========================
// HALAMAN MOBIL
// =========================
class MobilPage extends StatefulWidget {
  const MobilPage({super.key});

  @override
  State<MobilPage> createState() => _MobilPageState();
}

class _MobilPageState extends State<MobilPage> {
  late Future<List<Mobil>> _mobils;

  @override
  void initState() {
    super.initState();
    _mobils = ApiService().getMobils();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xffEAF2F8),

      // =========================
      // BODY
      // =========================
      body: SafeArea(
        child: Column(
          children: [
            // =========================
            // HEADER
            // =========================
            Container(
              height: 141.62,
              decoration: const BoxDecoration(
                image: DecorationImage(
                  image: AssetImage('assets/images/sewa_motor.png'),
                  fit: BoxFit.cover,
                  alignment: Alignment(0, 0.7),
                ),
              ),
              child: Column(
                children: [
                  // =========================
                  // SEARCH BAR
                  // =========================
                  Padding(
                    padding: const EdgeInsets.fromLTRB(15, 12, 15, 0),
                    child: Container(
                      height: 42,
                      decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(10),
                      ),
                      child: Row(
                        children: [
                          const SizedBox(width: 12),

                          const Icon(
                            Icons.search,
                            size: 20,
                            color: Colors.black54,
                          ),

                          const SizedBox(width: 8),

                          const Expanded(
                            child: Text(
                              'Search',
                              style: TextStyle(
                                color: Colors.grey,
                                fontSize: 13,
                              ),
                            ),
                          ),

                          const Icon(
                            Icons.mic_none,
                            size: 20,
                            color: Colors.black54,
                          ),

                          const SizedBox(width: 12),

                          const Icon(
                            Icons.shopping_cart_outlined,
                            size: 20,
                            color: Colors.black54,
                          ),

                          const SizedBox(width: 12),
                        ],
                      ),
                    ),
                  ),

                  const Spacer(),

                  // =========================
                  // PILIHAN MOTOR / MOBIL
                  // =========================
                  Container(
                    height: 38,
                    decoration: const BoxDecoration(
                      gradient: LinearGradient(
                        begin: Alignment.topCenter,
                        end: Alignment.bottomCenter,
                        colors: [Colors.transparent, Color(0xFF737373)],
                      ),
                    ),
                    child: const Row(
                      children: [
                        Expanded(
                          child: Center(
                            child: Text(
                              'Sepeda Motor',
                              style: TextStyle(
                                color: Colors.white,
                                fontSize: 13,
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                          ),
                        ),

                        Expanded(
                          child: Center(
                            child: Text(
                              'Mobil',
                              style: TextStyle(
                                color: Colors.white,
                                fontSize: 13,
                                fontWeight: FontWeight.w500,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),

            // =========================
            // DAFTAR KENDARAAN
            // =========================
            Expanded(
              child: Padding(
                padding: const EdgeInsets.all(15),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text(
                      'Daftar Kendaraan',
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                      ),
                    ),

                    const SizedBox(height: 12),

                    // =========================
                    // DATA DARI API
                    // =========================
                    Expanded(
                      child: FutureBuilder<List<Mobil>>(
                        future: _mobils,
                        builder: (context, snapshot) {
                          // =========================
                          // LOADING
                          // =========================
                          if (snapshot.connectionState ==
                              ConnectionState.waiting) {
                            return const Center(
                              child: CircularProgressIndicator(),
                            );
                          }

                          // =========================
                          // ERROR
                          // =========================
                          if (snapshot.hasError) {
                            return Center(
                              child: Text(
                                'Gagal mengambil data mobil\n'
                                '${snapshot.error}',
                                textAlign: TextAlign.center,
                              ),
                            );
                          }

                          // =========================
                          // DATA API
                          // =========================
                          final mobils = snapshot.data ?? [];

                          // =========================
                          // DATA KOSONG
                          // =========================
                          if (mobils.isEmpty) {
                            return const Center(
                              child: Text('Belum ada data mobil'),
                            );
                          }

                          // =========================
                          // GRID KENDARAAN
                          // =========================
                          return GridView.builder(
                            itemCount: mobils.length,

                            gridDelegate:
                                const SliverGridDelegateWithFixedCrossAxisCount(
                                  crossAxisCount: 2,
                                  crossAxisSpacing: 12,
                                  mainAxisSpacing: 12,
                                  childAspectRatio: 0.72,
                                ),

                            itemBuilder: (context, index) {
                              final mobil = mobils[index];

                              return Container(
                                decoration: BoxDecoration(
                                  color: Colors.white,
                                  borderRadius: BorderRadius.circular(12),
                                  boxShadow: const [
                                    BoxShadow(
                                      color: Colors.black12,
                                      blurRadius: 5,
                                      offset: Offset(0, 2),
                                    ),
                                  ],
                                ),

                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    // =========================
                                    // GAMBAR
                                    // =========================
                                    Container(
                                      height: 144,
                                      width: double.infinity,
                                      decoration: BoxDecoration(
                                        color: Colors.grey[200],
                                        borderRadius:
                                            const BorderRadius.vertical(
                                              top: Radius.circular(12),
                                            ),
                                      ),
                                      child: Image.asset(
                                        [
                                          'assets/images/Mercedes-Benz C 200.png',
                                          'assets/images/mazda3_hatchback.png',
                                          'assets/images/hyundai_palisade.png',
                                          'assets/images/BMWM4.png',
                                          'assets/images/fortuner.webp',
                                          'assets/images/chery_tiggo9.png',
                                          'assets/images/avanza.png',
                                          'assets/images/innova_reborn.png',
                                        ][index % 8],
                                        fit: BoxFit.contain,
                                      ),
                                    ),

                                    // =========================
                                    // INFORMASI
                                    // =========================
                                    Padding(
                                      padding: const EdgeInsets.all(10),
                                      child: Column(
                                        crossAxisAlignment:
                                            CrossAxisAlignment.start,
                                        children: [
                                          Text(
                                            mobil.nama,
                                            maxLines: 1,
                                            overflow: TextOverflow.ellipsis,
                                            style: const TextStyle(
                                              fontSize: 14,
                                              fontWeight: FontWeight.bold,
                                            ),
                                          ),

                                          const SizedBox(height: 5),

                                          Text(
                                            'Rp${mobil.harga}/hari',
                                            style: const TextStyle(
                                              fontSize: 12,
                                              fontWeight: FontWeight.w500,
                                              color: Color(0xFFFF0000),
                                            ),
                                          ),

                                          const SizedBox(height: 8),

                                          Row(
                                            children: [
                                              Container(
                                                width: 7,
                                                height: 7,
                                                decoration: const BoxDecoration(
                                                  color: Colors.green,
                                                  shape: BoxShape.circle,
                                                ),
                                              ),

                                              const SizedBox(width: 5),

                                              Text(
                                                mobil.status,
                                                style: const TextStyle(
                                                  fontSize: 11,
                                                  color: Colors.green,
                                                ),
                                              ),
                                            ],
                                          ),
                                        ],
                                      ),
                                    ),
                                  ],
                                ),
                              );
                            },
                          );
                        },
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),

      // =========================
      // NAVBAR
      // =========================
      bottomNavigationBar: Container(
        height: 65,
        color: Colors.white,
        child: Row(
          children: [
            // BERANDA
            Expanded(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: const [
                  Icon(Icons.home_outlined, size: 22, color: Color(0xFFFACC15)),
                  SizedBox(height: 3),
                  Text(
                    'Beranda',
                    style: TextStyle(fontSize: 11, color: Color(0xFFFACC15)),
                  ),
                ],
              ),
            ),

            // AKTIVITAS
            Expanded(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: const [
                  Icon(
                    Icons.receipt_long_outlined,
                    size: 22,
                    color: Colors.grey,
                  ),
                  SizedBox(height: 3),
                  Text(
                    'Aktivitas',
                    style: TextStyle(fontSize: 11, color: Colors.grey),
                  ),
                ],
              ),
            ),

            // PROFILE
            Expanded(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: const [
                  Icon(Icons.person_outline, size: 22, color: Colors.grey),
                  SizedBox(height: 3),
                  Text(
                    'Profile',
                    style: TextStyle(fontSize: 11, color: Colors.grey),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
