import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:van_operator_app/frontend/screens/attendance.dart';
import 'package:van_operator_app/frontend/screens/profile.dart';

import '../../backend/providers/auth_provider.dart';

class MyDrawer extends StatelessWidget {
  const MyDrawer({super.key});

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: ListView(
        padding: EdgeInsets.zero,
        children: [
          DrawerHeader(
            decoration: BoxDecoration(color: Colors.blue),
            child: Text(
              'Menu',
              style: TextStyle(color: Colors.white, fontSize: 24),
            ),
          ),
          ListTile(
            leading: Icon(Icons.home),
            title: Text('Home'),
            onTap: () {
              Navigator.pop(context);
            },
          ),
          ListTile(
            leading: Icon(Icons.person),
            title: Text('QR Code scanner'),
            onTap: () {
              Navigator.pop(context);
            },
          ),
          ListTile(
            leading: Icon(Icons.person),
            title: Text('Attendance'),
            onTap: () {
              //we first remove the context of the drawer
              Navigator.pop(context);
              // after that we push to the attendance screen
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => AttendanceScreen()),
              );
            },
          ),
          ListTile(
            leading: Icon(Icons.person),
            title: Text('Profile'),
            onTap: () {
              //we first remove the context of the drawer
              Navigator.pop(context);
              // after that we push to the profile screen
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => ProfileScreen()),
              );
            },
          ),
          ListTile(
            leading: Icon(Icons.settings),
            title: Text('Settings'),
            onTap: () {
              Navigator.pop(context);
            },
          ),
          ListTile(
            leading: Icon(Icons.question_answer_rounded),
            title: Text('Trip Management'),
            onTap: () {
              Navigator.pop(context);
            },
          ),
          ListTile(
            leading: Icon(Icons.logout),
            title: Text('Logout'),
            onTap: () async {
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
    );
  }
}
