import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:provider/provider.dart';
import 'package:icons_plus/icons_plus.dart';
import '../../backend/providers/auth_provider.dart';
import '../widgets/drawer.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final user = Provider.of<AuthProvider>(context).user;

    return Scaffold(
      appBar: AppBar(
        title: const Text('Dashboard'),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: () async {
              try {
                await Provider.of<AuthProvider>(
                  context,
                  listen: false,
                ).logout();
                // Navigation is handled by AuthWrapper
              } catch (e) {
                ScaffoldMessenger.of(context).showSnackBar(
                  SnackBar(content: Text('Logout failed: ${e.toString()}')),
                );
              }
            },
          ),
        ],
      ),
      drawer: MyDrawer(),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              'Welcome ${user?.name ?? ''}',
              style: GoogleFonts.poppins(
                fontSize: 16,
                fontWeight: FontWeight.w400,
              ),
            ),
            Text(
              'Role: ${user?.role ?? ''}',
              style: GoogleFonts.poppins(
                fontSize: 16,
                fontWeight: FontWeight.w300,
              ),
            ),
            SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                ScaffoldMessenger.of(
                  context,
                ).showSnackBar(SnackBar(content: Text("Trip has started")));
              },
              style: ElevatedButton.styleFrom(
                backgroundColor: const Color.fromARGB(255, 66, 37, 82),
                padding: const EdgeInsets.symmetric(
                  vertical: 16,
                  horizontal: 24.0,
                ),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(30),
                ),
                disabledBackgroundColor: Colors.grey[300],
              ),
              child: Row(
                mainAxisSize: MainAxisSize.min,
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    "Start Trip",
                    style: GoogleFonts.poppins(
                      color: Colors.white,
                      fontSize: 16,
                      fontWeight: FontWeight.w600,
                    ),
                  ),
                  const SizedBox(width: 8),
                  const Icon(IonIcons.timer, color: Colors.white, size: 20),
                ],
              ),
            ),
            SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                ScaffoldMessenger.of(
                  context,
                ).showSnackBar(SnackBar(content: Text("Trip has ended")));
              },
              style: ElevatedButton.styleFrom(
                backgroundColor: const Color.fromARGB(255, 66, 37, 82),
                padding: const EdgeInsets.symmetric(
                  vertical: 16,
                  horizontal: 24.0,
                ),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(30),
                ),
                disabledBackgroundColor: Colors.grey[300],
              ),
              child: Row(
                mainAxisSize: MainAxisSize.min,
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    "End Trip",
                    style: GoogleFonts.poppins(
                      color: Colors.white,
                      fontSize: 16,
                      fontWeight: FontWeight.w600,
                    ),
                  ),
                  const SizedBox(width: 8),
                  const Icon(IonIcons.timer, color: Colors.white, size: 20),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
